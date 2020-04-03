<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>

        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {

                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .datepicker{
                z-index: 10002 !important;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md" style="border-bottom: #636b6f solid 2px;">
                    Zarządzaj biurem
                </div>

  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Rezerwacje</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Stanowiska</a>
    </li>
  </ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rezerwacjamodal">
Dodaj rezerwację stanowiska
</button>

  <table class="table table-dark" id="usrTable">
  <thead>
    <tr>
    <th>Id</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Email</th>
                <th>Miejsce Pracy</th>
                <th>Data rezerwacji OD</th>
                <th>Data rezerwacji DO</th>
    </tr>
  </thead>

</table>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <table class="table table-dark" id="stanowiskaTable">
  <thead>
    <tr>
                <th>Stanowisko</th>
                <th>Model</th>
                <th>Rodzaj</th>
                <th>Akcja</th>
    </tr>
  </thead>

</table>
  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="rezerwacjamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="dodajForm">
              {{csrf_field()}}
        <div class="modal-body">
            <div class="row">
            <div style="margin-left: 30px;">
            <input type='text' class='form-control' placeholder="Imię..." id="imie" name='imie'>
            </div>
            <div>
            <input type='text' class='form-control' placeholder="Nazwisko..." id="nazwisko" name='nazwisko'>
            </div>
            </div>
            <div class="row">
            <div style="margin-left: 30px;">
            <input type='text' class='form-control' placeholder="Telefon..." id="telefon" name='telefon'>
            </div>
            <div>
            <input type='text' class='form-control' placeholder="E-mail..." id="email" name='email'>
            </div>
            </div>
            <div class="row">
            <div style="margin-left: 30px;">
            <input type='text' class='form-control' placeholder="Opis..." id="opis" name='opis'>
            </div>
            </div>
            <div class="row">
                <div style="margin-left: 30px;">
                <input type="date" class="form-control .col-5" id="datarezerwacji" class='datepicker' name='datarezerwacji'>
                </div>
            </div>
            <div class="row">

            <select class="form-control col-3" name="gdzod" id="gdzod" title="Godzina">
              <option selected disabled>Godziny od</option>
              @for($i = 1; $i < 21; $i++)
              <option value="{{$i}}">{{$i}}</option>
              @endfor
            </select>
            <select class="form-control col-2" name="minod" id="minod">
              <option selected disabled>Min</option>:
              <option value='15'>15</option>
              <option value='30'>30</option>
              <option value='45'>45</option>
              <option value='00'>00</option>
            </select>
--
            <select class="form-control col-3" name="gdzdo" id="gdzdo">
              <option selected disabled val="">Godziny do</option>
              @for($i = 1; $i < 21; $i++)
              <option value="{{$i}}">{{$i}}</option>
              @endfor
            </select>
            <select class="form-control col-2" name="mindo" id="mindo">
              <option selected disabled>Min</option>:
              <option value='15'>15</option>
              <option value='30'>30</option>
              <option value='45'>45</option>
              <option value='00'>00</option>
            </select>
            </div>
            <div id="textKomunikat">Wolne stanowiska w podanych godzinach:</div>
            <div id="msg"></div>
            <div id="komunikaty"></div>
            <select class="form-control col-2" name="miejscepracy" id="miejscepracy">
              <option selected disabled>Stanowiska</option>
              @foreach($miejscapracy as $miejsce)
              <option value="{{$miejsce->id}}">{{$miejsce->nazwa}}</option>
              @endforeach
            </select>

          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="saveBtn">Dodaj</button>
      </div>

      </form>

    </div>
  </div>
</div>
<!-- EDIIIIIT MOOOODALLLL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="dodajForm">
              {{csrf_field()}}
            <div class="modal-body">
            <div class="row">
            <div style="margin-left: 30px;">
            <input type='text' class='form-control' placeholder="" id="stanowisko" name='stanowisko' value="" disabled>
            </div>
            <div>
            <input type='text' class='form-control' placeholder="Nazwisko..." id="nazwisko" name='nazwisko'>
            </div>
            </div>
            <div class="row">
            <select class="form-control col-4" name="wyposaz" id="wyposaz" placeholder="Wyposażenie...">
              @foreach($stanowiska as $stanowisko)
              <option value="{{$stanowisko->id}}">{{$stanowisko->id}}-{{$stanowisko->rodzaj}} {{$stanowisko->model}}</option>
              @endforeach
            </select>
            </div>

          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="saveBtn">Dodaj</button>
      </div>

      </form>

    </div>
  </div>
</div>


<script>
$('#rezerwacjamodal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
/*$( function() {
    $( "#datepicker" ).datepicker();
  } );*/

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var url = $("#dodajForm").attr('action');

$(document).ready(function () {

    $('#saveBtn').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          url: "/rezerwacje/Dodaj",
          method: "POST",
          data: $('#dodajForm').serialize(),
          success: function (data) {

            if(data.resetForm === true)
            {
              $("#imie").val('');
              $("#nazwisko").val('');
              $("#telefon").val('');
              $("#email").val('');
              $("#opis").val('');
              $("#datarezerwacji").val('');
              $('#minod').prop('selectedIndex',0);
              $('#mindo').prop('selectedIndex',0);
              $('#gdzod').prop('selectedIndex',0);
              $('#gdzdo').prop('selectedIndex',0);
              $('#miejscepracy').prop('selectedIndex',0);
              $('#usrTable').DataTable().ajax.reload();
              $("#komunikaty").html(data.komunikat);
              $("#msg").html('');

            }
            else
            {
              $("#komunikaty").html(data.komunikat);
            }
          },
          error: function (request, status, error) {
            console.log(error);
            console.log('testerror');
            $("#komunikaty").html("Error... sprawdź konsolę!");
          }
        });

    });
    $('#usrTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('get.Data') !!}',
      columns: [
            { data: 'id', name: 'id' },
            { data: 'imie', name: 'imie' },
            { data: 'nazwisko', name: 'nazwisko' },
            { data: 'email', name: 'email' },
            { data: 'nazwa', name: 'nazwa' },
            { data: 'kiedy_rezerwacja_od', name: 'kiedy_rezerwacja_od' },
            { data: 'kiedy_rezerwacja_do', name: 'kiedy_rezerwacja_do' }
        ]
    });
    $('#stanowiskaTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('get.Stanowiska') !!}',
      columns: [
            { data: 'nazwa', name: 'nazwa' },
            { data: 'model', name: 'model' },
            { data: 'rodzaj', name: 'rodzaj' },
            {data: 'action', name: 'action', orderable: false, searchable: false}

        ]
    });
    $(document).on('click', '.edit', function () {
      var kik = $(this).attr('id');
      alert(kik);
        $.ajax({
          url: "/stanowisko/"+$(this).attr('id'),
          success: function (data) {
            console.log("testowanie edit clicka");
            console.log(data);
          },
          error: function (request, status, error) {
            console.log(error);
            console.log('test error edit klika');
          }
        });
    });
    $("#mindo, #minod, #gdzod, #gdzdo, #datarezerwacji").change(function(e){
      e.preventDefault();
        $.ajaxSetup({
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
        url: "/rezerwacje/spr",
        method: "POST",
        data: $('#dodajForm').serialize(),
        success: function (data) {
          console.log("dziala poprawnie");
          $("#msg").html("<p>"+data.msg+"</p>");
          console.log(data.msg);
        },
        error: function (request, status, error) {
            console.log(error);
            console.log('Error//');
          }
      });

    });

});
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </div>
        </div>
    </body>
</html>
