<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
use App\Services\PackageQueryServices;
trait PackageQueryTrail
{
    private  PackageQueryServices $packageQueryServices;

    public function __construct(PackageQueryServices $packageQueryServices)
    {
        $this->packageQueryServices = $packageQueryServices;
    }

    public function store(Request $request)
    {
        $PackageQueryServices = app(PackageQueryServices::class)->store($request);
        if ($PackageQueryServices) {
            return response(["status" => 200, "message" => "Package Request Sent!"]);
        } else {
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }
}
