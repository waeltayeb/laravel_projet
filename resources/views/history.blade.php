<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('history payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="data_table">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Name</th>
                                                <th>Duration</th>
                                                <th>Rising</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ Auth::user()->name }}</td>
                                            <td>{{ $payment->duration }}</td>
                                            <td>{{ $payment->montant }}</td>
                                            <td>{{ $payment->date }}</td>
                                            <td style="background-color: {{ $payment->statut === 'en cour' ? 'yellow' : 'green' }}; border-radius: 5px;">{{ $payment->statut }}</td>
                                        </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                    <script src="assets/js/bootstrap.bundle.min.js"></script>
                                    <script src="assets/js/jquery-3.6.0.min.js"></script>
                                    <script src="assets/js/datatables.min.js"></script>
                                    <script src="assets/js/custom.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            </div>
        </div>
    </div>
</x-app-layout>
