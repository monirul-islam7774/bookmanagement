<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books Application</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('styles.css')}}">
</head>

<body>
<div id="showData">
    <div class="container">
        <div class="row bookDetails">
            <div class="col-md-12">
                <a href="{{url('/')}}">Home</a>
            </div>
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group">
                    <label for="sel1">Select Writer :</label>
                    <select class="form-control writerName" >
                        <option disabled hidden selected>Click to choose</option>
                        @foreach($users as $key=>$user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>Writer Name</th>
                        <th>Book Name</th>
                        <th>Published Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><td colspan="3">No Data Found</td></tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div> <!-- end of .container -->
</div> <!-- end of #app -->


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

    $('.writerName').on('change', function() {
        var id = $(this).val();
       var name=$(".writerName :selected").text();
        $.ajax({
            type: 'POST',
            url: "{{route('fetchData')}}",
            data: {
                'id': id,
                '_token':'{{csrf_token()}}'
            },
            success: function (datas) {
             rows='';
                $.each(datas, function (key, data) {
                    var today = new Date(data.published);
                   rows=rows+'  <tr>\n' +
                       '<td>'+name+'</td>\n' +
                       '<td>'+data.book_name+'</td>\n' +
                       '<td>'+today.toDateString()+'</td>\n' +
                       '</tr>'
                });

                $('tbody').html(rows);
            }
        });
    });

</script>
</html>
