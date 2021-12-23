<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset(route('serve-swagger.asset', ['asset' => 'swagger-ui', 'ext' => 'css'], false)) }}" >
    <link rel="icon" type="image/png" href="{{ asset(route('serve-swagger.asset', ['asset' => 'favicon-32x32', 'ext' => 'png'], false)) }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset(route('serve-swagger.asset', ['asset' => 'favicon-16x16', 'ext' => 'png'], false)) }}" sizes="16x16" />
    <style>
      html
      {
          box-sizing: border-box;
          overflow: -moz-scrollbars-vertical;
          overflow-y: scroll;
      }

      *,
      *:before,
      *:after
      {
          box-sizing: inherit;
      }

      body
      {
          margin:0;
          background: #fafafa;
      }
    </style>
  </head>

  <body>
    <div id="swagger-ui"></div>

    <script src="{{ asset(route('serve-swagger.asset', ['asset' => 'swagger-ui-bundle', 'ext' => 'js'], false)) }}"> </script>
    <script src="{{ asset(route('serve-swagger.asset', ['asset' => 'swagger-ui-standalone-preset', 'ext' => 'js'], false)) }}"> </script>
    <script>
    window.onload = function() {

        // Begin Swagger UI call region
        const ui = SwaggerUIBundle({
            "dom_id": "#swagger-ui",
            deepLinking: true,
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            layout: "StandaloneLayout",
            validatorUrl: "https://validator.swagger.io/validator",
            urls: @json($urls),
        });


        // End Swagger UI call region


        window.ui = ui
    }
  </script>
  </body>
</html>
