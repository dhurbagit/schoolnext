<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button id="click">Click me</button>
    <div class="result">

    </div>

    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/ckeditor/build/ckeditor.js') }}"></script>

    <script>
        var count = 1;
        $(document).on('click','#click',function(e){

            $('.result').append('<textarea name=""   class="editor" cols="30" rows="10"></textarea>');

            $('.editor').hide();

            ckeditor();

        });
        function ckeditor()
        {
            ClassicEditor
            .create(document.querySelector('.editor'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: zcqz3ups1g1q-7004ol2st27j');
                console.error(error);
            });

        }
    </script>



</body>
</html>
