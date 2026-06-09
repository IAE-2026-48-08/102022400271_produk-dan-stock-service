<?php

namespace App;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "Product & Stock Service API",
    description: "API untuk manajemen produk dan stok"
)]

#[OA\Server(
    url: "http://127.0.0.1:8000",
    description: "Local Server"
)]

#[OA\SecurityScheme(
    securityScheme: "bearerAuth",
    type: "http",
    scheme: "bearer",
    bearerFormat: "JWT"
)]

class OpenApiSpec
{
}