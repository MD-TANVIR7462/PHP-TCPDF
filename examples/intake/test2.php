<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Test Google translate</title>
        <style>
           .skiptranslate, #google_translate_element {display: none;}
            body {min-height: 0px !important; position: static !important; top: 0px !important;}
        </style>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </head>
    <body>
    The text is translated using Google translate.
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            $.when(
                new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es',
                    layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element')
            ).done(function(){
                var select = document.getElementsByClassName('goog-te-combo')[0];
                select.selectedIndex = 1;
                select.addEventListener('click', function () {
                    select.dispatchEvent(new Event('change'));
                });
                select.click();
            });
        }
    </script>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    </body>
    </html>