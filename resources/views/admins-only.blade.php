<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-body text-center p-5">
                        <h1 class="display-4 mb-4 text-primary bold">Welcome, <span class="italic">{{ucwords(auth()->user()->username) }}! </span></h1>
                        <p class="lead mb-5">You have accessed a secure area reserved for administrators only. Proceed with caution.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>