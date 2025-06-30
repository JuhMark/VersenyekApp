<x-layout>
    <x-slot:heading>Felhasználók</x-slot:heading>
    <!--<x-list>
        @foreach ($felhasznalok as $felhasznalo)
            <li class="mb-1 mt-1 transition delay-150 duration-300 ease-in-out hover:text-blue-700 border-2"><a href="/felhasznalok/{{$felhasznalo['email']}}">
                Név: {{$felhasznalo['firstName']." ".$felhasznalo['lastName']}} <br/> Email: {{$felhasznalo['email']}}
            </a></li>
        @endforeach
    </x-list>-->
    <div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div class="card">
                <div class="card-header">
                    <h4>
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddFelhasznaloModal">
                        Új felhasználó hozzáadása
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="AddFelhasznaloModal" tabindex="-1" aria-labelledby="AddFelhasznaloModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddFelhasznaloModalLabel">Új felhasználó hozzáadása</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Bezárás"></button>
            </div>
            <div class="modal-body">
                <ul id="save_msgList"></ul>
                <div class="form-group mb-3">
                    <label for="">Vezetéknév</label>
                    <input type="text" required class="lastName form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Keresztnév</label>
                    <input type="text" required class="firstName form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" required class="email form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Telefonszám</label>
                    <input type="phone" class="phone form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Lakcím</label>
                    <input type="address" class="address form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
                <button type="button" class="btn btn-primary add_felhasznalo">Mentés</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        fetchfelhasznalo();

        function fetchfelhasznalo() {
            $.ajax({
                type: "GET",
                url: "/fetch-felhasznalok",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('tbody').html("");
                    $.each(response.felhasznalok, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.firstName + '</td>\
                            <td>' + item.lastName + '</td>\
                            <td>' +'<a class="mb-1 mt-1 transition delay-150 duration-300 ease-in-out hover:text-blue-700" href="/felhasznalok/'+item.email+'">'+item.email +'</a>'+'</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_felhasznalo', function (e) {
            e.preventDefault();

            $(this).text('Küldés..');

            var data = {
                'email': $('.email').val(),
                'firstName': $('firstName').val(),
                'lastName': $('lastName').val(),
                'phone': $('phone').val(),
                'address': $('address').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "felhasznalok",
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.status >= 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Mentés');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddFelhasznaloModal').find('input').val('');
                        $('.add_student').text('Save');
                        $('#AddFelhasznaloModal').modal('hide');
                        fetchfelhasznalo();
                    }
                }
            });

        });
    });
</script>
</x-layout>