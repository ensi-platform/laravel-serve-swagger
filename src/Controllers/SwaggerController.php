<?php

namespace Greensight\LaravelServeSwagger\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SwaggerController extends Controller
{
    public function documentation()
    {
        $urls = [];
        foreach (config('serve-swagger.urls') as $url) {
            $urls[] = [
                'url' => url($url['url']),
                'name' => $url['name'],
            ];
        }
        return view('serve-swagger::swagger', [
            'title' => 'Swagger UI',
            'urls' => $urls,
        ]);
    }

    public function asset($asset, $ext)
    {
        $assetFile = $asset . '.' . $ext;
        $path = $this->swagger_ui_dist_path($assetFile);

        return (new Response(file_get_contents($path), 200, [
            'Content-Type' => (pathinfo($path))['extension'] == 'css' ? 'text/css' : 'application/javascript',
        ]))->setSharedMaxAge(31536000)
            ->setMaxAge(31536000)
            ->setExpires(new \DateTime('+1 year'));
    }

    protected function swagger_ui_dist_path($asset = null)
    {
        $allowed_files = [
            'favicon-16x16.png',
            'favicon-32x32.png',
            'oauth2-redirect.html',
            'swagger-ui-bundle.js',
            'swagger-ui-bundle.js.map',
            'swagger-ui-standalone-preset.js',
            'swagger-ui-standalone-preset.js.map',
            'swagger-ui.css',
            'swagger-ui.css.map',
            'swagger-ui.js',
            'swagger-ui.js.map',
        ];

        $path = base_path('vendor/swagger-api/swagger-ui/dist/');

        if (!$asset) {
            return realpath($path);
        }

        if (!in_array($asset, $allowed_files)) {
            throw new NotFoundHttpException();
        }

        return realpath($path . $asset);
    }
}
