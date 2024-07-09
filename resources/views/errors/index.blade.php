<x-app-layout>
    <section class="section">
        <div class="container mt-5">
          <div class="page-error">
            <div class="page-inner">
              <h1>404 </h1>
              <div class="page-description">
                {{ $exception }}
              </div>
              <div class="page-search">
                
                <div class="mt-3">
                  <a href="/dashboard">Back to Home</a>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-5 simple-footer">
            Copyright &copy; Stisla 2018
          </div>
        </div>
      </section>
</x-app-layout>

