@include('layouts.partials._header')

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white dark:bg-gray-800 shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
    @endif
    
    <!-- Page Content -->
    <main>
      @if (isset($createPart) & isset($listPart))
        <!-- Create Part -->
        {{ $createPart }}
        <!-- List Part -->
        {{ $listPart }}
      @else
        {{ $slot }}
      @endif

    </main>
  </div>
  
  @include('layouts.partials._footer')
</body>
</html>
