Berikut adalah panduan dan kode dengan sintaks Markdown untuk diimplementasikan oleh Agent, berdasarkan dokumentasi sumber yang tersedia.

# Implementasi CRUD Produk dengan Laravel

**Gambaran Umum:** Laravel menyediakan fitur **Resource Controller** yang secara otomatis memetakan tujuh *method* standar untuk operasi CRUD (Create, Read, Update, Delete) sehingga Anda tidak perlu mendefinisikan rute satu per satu. Seluruh logika operasi ini akan berada di dalam `app/Http/Controllers/ProductController.php`, model di `app/Models/Product.php`, dan tampilan *user interface* (UI) berada di direktori `resources/views/produk/`.

---

### Langkah 1: Migrasi Database

Tabel `products` dibuat menggunakan perintah CLI dan memuat struktur data untuk produk. 
**Perintah:**
```bash
php artisan make:migration create_products_table
php artisan migrate
```

**Kode Skema Migrasi:**
```php
// database/migrations/2026_05_05_..._create_products_table.php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name', 100);
    $table->decimal('price', 10, 2);
    $table->text('description')->nullable();
    $table->enum('status', ['new', 'used'])->default('new');
    $table->boolean('is_active')->default(true);
    $table->date('release_date')->nullable();
    $table->timestamps();
});
```
*Penjelasan:* Struktur di atas mendefinisikan kolom spesifik seperti `name` (maksimal 100 karakter), `price`, dan status dengan *default value*.

---

### Langkah 2: Model Product

Model Eloquent menghubungkan kode dengan tabel database. Properti `$fillable` wajib didefinisikan sebagai *whitelist* kolom untuk perlindungan dari kerentanan keamanan **Mass Assignment**.

**Kode Model:**
```php
// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    
    // Wajib untuk mass assignment via Product::create() atau update()
    protected $fillable = [
        'name', 'price', 'description', 'status', 'is_active', 'release_date',
    ];
}
```

---

### Langkah 3 & 4: Resource Controller & Routing

Resource controller otomatis membuat 7 *method* (`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`). Daftarkan rute menggunakan `Route::resource` yang otomatis mendaftarkan semua *endpoint* HTTP.

**Perintah membuat Controller:**
```bash
php artisan make:controller ProductController --resource
```

**Kode Routing:**
```php
// routes/web.php
use App\Http\Controllers\ProductController;

Route::resource('/produk', ProductController::class);
```

---

### Langkah 5: Logika Controller (`ProductController.php`)

Controller ini akan menangani pembacaan data, penyimpanan dengan validasi, pembaruan, dan penghapusan data secara aman dengan melempar HTTP 404 (ModelNotFoundException) jika data tak ditemukan menggunakan fungsi `findOrFail()`.

**Kode Controller:**
```php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Read All (Menampilkan daftar data dengan paginasi 10 per halaman)
    public function index()
    {
        $title    = "Daftar Produk";
        $products = Product::paginate(10); 
        return view('produk.index', compact('title', 'products'));
    }

    // Form Create
    public function create()
    {
        $title = "Tambah Produk";
        return view('produk.create', compact('title'));
    }

    // Create - Menyimpan data dan memvalidasi input
    public function store(Request $request)
    {
        // Validasi bawaan Laravel
        $validated = $request->validate([
            'name'         => 'required|string|max:100',
            'price'        => 'required|numeric|min:0',
            'description'  => 'nullable|string',
            'status'       => 'required|in:new,used',
            'is_active'    => 'nullable|boolean',
            'release_date' => 'nullable|date',
        ], [
            // Pesan Kustom Bahasa Indonesia
            'name.required'    => 'Nama produk wajib diisi.',
            'name.max'         => 'Nama produk maksimal 100 karakter.',
            'price.required'   => 'Harga produk wajib diisi.',
            'price.numeric'    => 'Harga produk harus berupa angka.',
            'price.min'        => 'Harga produk tidak boleh negatif.',
            'status.required'  => 'Status produk wajib dipilih.',
            'status.in'        => 'Status produk harus new atau used.',
            'release_date.date'=> 'Format tanggal rilis tidak valid.',
        ]);           
        
        $validated['is_active'] = $request->has('is_active') ? 1 : 0; 
        Product::create($validated);                      
        
        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Read One (Menampilkan detail 1 data)
    public function show(string $id)
    {
        $title   = "Detail Produk";
        $product = Product::findOrFail($id); 
        return view('produk.detail', compact('product', 'title'));
    }

    // Form Edit
    public function edit(string $id)
    {
        $title   = "Edit Produk";
        $product = Product::findOrFail($id);
        return view('produk.edit', compact('product', 'title'));
    }

    // Update - Memperbarui data setelah divalidasi
    public function update(Request $request, string $id)
    {
        $product   = Product::findOrFail($id);
        $validated = $request->validate([
            'name'         => 'required|string|max:100',
            'price'        => 'required|numeric|min:0',
            'description'  => 'nullable|string',
            'status'       => 'required|in:new,used',
            'is_active'    => 'nullable|boolean',
            'release_date' => 'nullable|date',
        ]);
        
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $product->update($validated);
        
        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    // Delete - Menghapus data dari DB
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}
```

---

### Langkah 6: Implementasi View Blade (Panduan Elemen UI)

Dalam mengembangkan *views* (`index.blade.php`, `create.blade.php`, `edit.blade.php`), pastikan untuk mengimplementasikan fungsionalitas berikut.

**1. Flash Message:**
Setelah operasi CRUD sukses, pesan kesuksesan akan dikirim melalui sistem *session* dari controller.
```html
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
```

**2. Form Error dan Fungsi `old()`:**
Laravel akan otomatis mengembalikan Anda ke formulir jika validasi gagal. Gunakan fungsi `old()` untuk mempertahankan input teks sebelumnya atau untuk memanggil data yang sudah ada dari database pada form edit.
```html
{{-- Contoh input teks dengan pesan error per field --}}
<input type="text" name="name" 
       class="form-control @error('name') is-invalid @enderror" 
       value="{{ old('name', $product->name ?? '') }}">
@error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror

{{-- Contoh untuk Checkbox --}}
<input type="checkbox" name="is_active" value="1"
       {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
```

**3. Keamanan Form & Method Spoofing:**
Setiap pengiriman POST wajib memiliki *token* **`@csrf`** untuk mencegah kerentanan Cross-Site Request Forgery (CSRF). Karena HTML hanya bisa menggunakan GET dan POST, ubah *request* menjadi PUT/PATCH/DELETE dengan **`@method`**.

```html
{{-- Contoh Form Update --}}
<form action="{{ route('produk.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Input form di sini -->
</form>

{{-- Contoh Form Delete --}}
<form action="{{ route('produk.destroy', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>
```
