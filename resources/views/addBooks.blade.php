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
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="lead-form">
                    <h1 class="text-center">Add Books</h1>
                    <hr />
                    <div class="row">
                        <form action="{{route('book.save')}}" method="post" id="validation-form">

                            {{csrf_field()}}

                            <div class="col-md-12 form-group">
                                <label>Writer's Name</label>
                                <input id="writer" name="writer" type="text" class="form-control" placeholder="Writer's Name">
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Book's Name</label>
                                <input id="book" name="book" type="text" class="form-control" placeholder="Book's Name">
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Published Year</label>
                                <input id="year" name="year" type="month" class="form-control" placeholder="Published Year">
                            </div>

                            @if (session('success'))
                                <div class="col-md-12 form-group">
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{{ session('success') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-primary btn-block submit_btn">Submit</button>

                            </div>
                            <div class="col-md-12 form-group">
                                <a href="{{url('show-books')}}" class="btn btn-info pull-right">Show</a>
                            </div>
                        </form>
                    </div>
                </div><!-- end of .lead-form -->
            </div> <!-- end of .col-md-6.col-md-offset-3 -->
        </div> <!-- end of .row -->
    </div> <!-- end of .container -->
</div> <!-- end of #app -->


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>

<script>
    $(document).ready(function(){

        $('#validation-form').validate(
            {
                rules: {
                    writer: {
                        minlength: 3,
                        maxlength:30,
                        required: true
                    },
                    book: {
                        required: true,
                        maxlength:30,
                        minlength: 2
                    },
                    year:{
                        required: true
                    }
                },

                highlight: function (e) {
                    $(e).closest('.form-group').addClass('has-error');
                },

                success: function (e) {
                    $(e).closest('.form-group').removeClass('has-error');
                    $(e).remove();
                },
                errorPlacement: function(error, element) {
                    if (element.attr("id") == "writer") {
                        error.insertAfter($(element).closest("#writer"));
                    }
                    else if(element.attr("id") == "book") {
                        error.insertAfter("#book");
                    }
                    else if(element.attr("id") == "year") {
                        error.insertAfter($(element).closest("#year"));
                    }
                },
                submitHandler: function (form) {
                },
                invalidHandler: function (form) {
                }
            });

        $('.submit_btn').click(function (e) {

            if (!$('#validation-form').valid()) e.preventDefault();
            else{
                document.getElementById("validation-form").submit();
            }
        });
    });
</script>
</html>