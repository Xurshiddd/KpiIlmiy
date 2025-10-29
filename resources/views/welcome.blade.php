<!doctype html>
<html lang="uz">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Institut Maqolalari — Bosh Sahifa</title>
  <meta name="description" content="Institut uchun maqolalar platformasi. So'nggi maqolalar, kategoriyalar va qidiruv.">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Small utility to keep card images consistent */
    .card-img { height: 160px; object-fit: cover; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
  <!-- Header -->
  <header class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <a href="/" class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold">I</div>
          <div class="text-lg font-semibold">Institut Maqolalari</div>
        </a>

        <nav class="hidden md:flex items-center gap-6 text-sm">
          <a href="#" class="hover:text-indigo-600">Bosh sahifa</a>
          <a href="#categories" class="hover:text-indigo-600">Kategoriyalar</a>
          <a href="#about" class="hover:text-indigo-600">Biz haqimizda</a>
          <a href="#contact" class="hover:text-indigo-600">Kontakt</a>
        </nav>

        <div class="flex items-center gap-3">
          <form class="hidden sm:flex items-center bg-gray-100 rounded-full px-3 py-1" role="search">
            <input aria-label="maqola qidiruvi" class="bg-transparent outline-none text-sm" placeholder="Maqola qidirish..." />
            <button type="submit" class="ml-2 text-sm">Qidir</button>
          </form>
          <a href="{{ route('hemis.redirect') }}" class="inline-flex items-center px-3 py-1.5 border rounded-md text-sm hover:bg-gray-50">Kirish</a>
          <a href="/admin/login" class="inline-flex items-center px-3 py-1.5 border rounded-md text-sm hover:bg-gray-50">Admin</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Hero -->
  <section class="bg-gradient-to-r from-indigo-600 to-indigo-400 text-white">
    <div class="max-w-7xl mx-auto px-4 py-16 sm:py-24 lg:py-32">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <div>
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">Institut Maqolalari</h1>
          <p class="mt-4 text-indigo-100 max-w-xl">So'nggi ilmiy maqolalar, tahlillar va yangiliklar. Talabalar, tadqiqotchilar va o'qituvchilar uchun doimiy manba.</p>

          <div class="mt-6 flex gap-3">
            <a href="#articles" class="bg-white text-indigo-700 px-4 py-2 rounded-md font-medium shadow-sm">So'nggi maqolalar</a>
            <a href="#categories" class="border border-white/30 px-4 py-2 rounded-md text-white/90">Kategoriyalar</a>
          </div>

          <form class="mt-6 sm:max-w-md bg-white/10 p-3 rounded-md" aria-label="qidiruv mobil">
            <label for="search-mobile" class="sr-only">Maqola qidiruvi</label>
            <div class="flex gap-2">
              <input id="search-mobile" class="w-full bg-transparent placeholder-indigo-100 outline-none" placeholder="Maqola nomi, muallif yoki kalit so'z..." />
              <button type="submit" class="bg-white text-indigo-700 px-4 py-2 rounded-md">Qidir</button>
            </div>
          </form>
        </div>

        <div class="hidden lg:block">
          <div class="rounded-lg overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder" alt="ilmiy maktab" class="w-full h-72 object-cover" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

      <!-- Articles list -->
      <section id="articles" class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-sm p-6">
          <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">So'nggi maqolalar</h2>
            <a href="#" class="text-sm text-indigo-600 hover:underline">Hammasini ko'rish</a>
          </div>

          <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Article card repeated -->
            <article class="bg-gray-50 rounded-lg overflow-hidden border">
              <img class="w-full card-img" src="https://images.unsplash.com/photo-1532619675605-0d07a0049a45?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder" alt="Maqola rasmi" />
              <div class="p-4">
                <a href="#" class="text-sm text-indigo-600 font-medium">Tadqiqot</a>
                <h3 class="mt-2 font-semibold text-lg"><a href="#">Ilmiy tadqiqotlarda yangi metod — qisqacha tanishtirish</a></h3>
                <p class="mt-2 text-sm text-gray-600">Bu maqolada biz yangi metodologiyani qisqacha ko'rib chiqamiz va amaliy misollar bilan ko'rsatamiz.</p>
                <div class="mt-3 flex items-center justify-between text-xs text-gray-500">
                  <div>Muallif: <span class="text-gray-700">Dr. A. Karimov</span></div>
                  <time datetime="2025-10-20">Oct 20, 2025</time>
                </div>
              </div>
            </article>

            <article class="bg-gray-50 rounded-lg overflow-hidden border">
              <img class="w-full card-img" src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder" alt="Maqola rasmi" />
              <div class="p-4">
                <a href="#" class="text-sm text-indigo-600 font-medium">Ta'lim</a>
                <h3 class="mt-2 font-semibold text-lg"><a href="#">Yangi o'quv dasturlari va talabalar uchun qo'llanma</a></h3>
                <p class="mt-2 text-sm text-gray-600">O'quv dasturlarini yangilash bo'yicha tavsiyalar va amaliy maslahatlar.</p>
                <div class="mt-3 flex items-center justify-between text-xs text-gray-500">
                  <div>Muallif: <span class="text-gray-700">M. Islomov</span></div>
                  <time datetime="2025-09-30">Sep 30, 2025</time>
                </div>
              </div>
            </article>

            <!-- Add more article cards as needed -->
          </div>

          <!-- Pagination -->
          <div class="mt-6 flex justify-center">
            <nav class="inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
              <a href="#" class="px-3 py-2 rounded-l-md border bg-white text-sm">Oldingi</a>
              <a href="#" class="px-3 py-2 border bg-white text-sm">1</a>
              <a href="#" class="px-3 py-2 border bg-white text-sm">2</a>
              <a href="#" class="px-3 py-2 border bg-white text-sm">Keyingi</a>
            </nav>
          </div>
        </div>
      </section>

      <!-- Sidebar -->
      <aside class="space-y-6">
        <div class="bg-white p-4 rounded-lg shadow-sm">
          <h3 class="font-semibold">Kategoriyalar</h3>
          <ul id="categories" class="mt-3 space-y-2 text-sm text-gray-600">
            <li><a href="#" class="hover:text-indigo-600">Ilmiy tadqiqot</a></li>
            <li><a href="#" class="hover:text-indigo-600">Ta'lim</a></li>
            <li><a href="#" class="hover:text-indigo-600">Yangiliklar</a></li>
            <li><a href="#" class="hover:text-indigo-600">Intervyu</a></li>
          </ul>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm">
          <h3 class="font-semibold">Mashhur maqolalar</h3>
          <ol class="mt-3 text-sm space-y-2 text-gray-600">
            <li><a href="#" class="hover:text-indigo-600">Akademik yozuvning 10 qoidasi</a></li>
            <li><a href="#" class="hover:text-indigo-600">Tadqiqot grantlariga yozish bo'yicha ko'rsatma</a></li>
            <li><a href="#" class="hover:text-indigo-600">Laboratoriya xavfsizligi: muhim jihatlar</a></li>
          </ol>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm">
          <h3 class="font-semibold">Obuna bo'ling</h3>
          <p class="text-sm text-gray-600 mt-2">Eng yangi maqolalar va e'lonlarni elektron pochtangizga oling.</p>
          <form class="mt-3 flex gap-2">
            <input aria-label="email" placeholder="Email manzilingiz" class="w-full px-3 py-2 border rounded-md text-sm" />
            <button class="px-3 py-2 bg-indigo-600 text-white rounded-md text-sm">Obuna</button>
          </form>
        </div>
      </aside>

    </div>

    <!-- About / Footer anchor -->
    <section id="about" class="mt-10 bg-white rounded-lg p-6 shadow-sm">
      <h3 class="text-lg font-semibold">Biz haqimizda</h3>
      <p class="mt-3 text-sm text-gray-600">Institut Maqolalari portali ilmiy hamjamiyat uchun maqolalar, yangiliklar va resurslarni taqdim etadi. Bizning maqsad — sifatli ilmiy axborotni keng auditoriyaga yetkazish.</p>
    </section>

    <footer id="contact" class="mt-8 text-sm text-gray-600">
      <div class="border-t mt-6 pt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>© 2025 Institut Maqolalari. Barcha huquqlar himoyalangan.</div>
        <div class="flex gap-4">
          <a href="#" class="hover:text-indigo-600">Privacy</a>
          <a href="#" class="hover:text-indigo-600">Kontakt</a>
        </div>
      </div>
    </footer>
  </main>

</body>
</html>
