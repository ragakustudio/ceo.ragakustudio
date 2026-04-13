# CEO Ragaku Studio — Laravel 12

Project ini hasil konversi dari CodeIgniter 3 ke Laravel 12.

---

## Cara Install di Local

### 1. Buat project Laravel 12 baru
```bash
composer create-project laravel/laravel ceo-ragakustudio
cd ceo-ragakustudio
```

### 2. Copy file-file dari zip ini ke project Laravel

Salin file dan folder berikut ke dalam project Laravel kamu:

```
app/Http/Controllers/CeoController.php
    → app/Http/Controllers/CeoController.php

routes/web.php
    → routes/web.php  (replace isinya)

resources/views/layouts/main.blade.php
    → resources/views/layouts/main.blade.php

resources/views/partials/head.blade.php
    → resources/views/partials/head.blade.php

resources/views/partials/navbar.blade.php
    → resources/views/partials/navbar.blade.php

resources/views/partials/footer.blade.php
    → resources/views/partials/footer.blade.php

resources/views/sections/hero.blade.php
    → resources/views/sections/hero.blade.php

resources/views/sections/about.blade.php
    → resources/views/sections/about.blade.php

resources/views/sections/impact.blade.php
    → resources/views/sections/impact.blade.php

resources/views/sections/approach.blade.php
    → resources/views/sections/approach.blade.php

resources/views/sections/cta.blade.php
    → resources/views/sections/cta.blade.php

public/assets/js/app.js
    → public/assets/js/app.js

public/assets/img/*
    → public/assets/img/
```

### 3. Jalankan server
```bash
php artisan serve
```

Buka browser di: http://localhost:8000

---

## Perubahan dari CI3 → Laravel 12

| CI3 | Laravel 12 |
|-----|-----------|
| `$this->load->view('partials/head')` | `@include('partials.head')` |
| `base_url('public/assets/...')` | `asset('assets/...')` |
| `<?= date('Y') ?>` | `{{ date('Y') }}` |
| `config/routes.php` | `routes/web.php` |
| `application/views/` | `resources/views/` |
| `.php` views | `.blade.php` views |
| `CI_Controller` extends | `Controller` extends |

---

## Catatan
- File `.env` tidak perlu diubah, project ini tidak pakai database
- Pastikan PHP >= 8.2 dan Composer sudah terinstall
- Image assets (`.heic`, `.jpg`, `.png`) tetap di `public/assets/img/`
