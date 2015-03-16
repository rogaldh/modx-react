<html>

    <head>
        <script src="{$template_url}basic-example/bundle/app.js"></script>
    </head>

    <body>{$modx->runSnippet('react',[ "cmp"=>'./basic-example/src/cmp2.jsx', "text"=>123 ])}
    </body>

</html>