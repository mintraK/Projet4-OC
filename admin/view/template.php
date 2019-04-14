<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog</title>
        <link rel="icon" type="image/jpg" href="../public/images/logo.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src='tinymce/js/tinymce/tinymce.min.js' type='text/javascript'></script>
        <script>
        tinymce.init({
            selector: 'textarea',
            themes: 'modern',
            height: 200,
            language: 'fr_FR' ,
            menubar:false,
            plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
          ],
          toolbar: 'undo redo | formatselect | bold italic underline| alignleft aligncenter alignright alignjustify |cut copy paste|image | removeformat | help',
        
        });
        </script>
        <link rel="stylesheet" href="../public/style.css">
    </head>
        
    <body>
        <?= $content ?>
       
    </body>
</html>

