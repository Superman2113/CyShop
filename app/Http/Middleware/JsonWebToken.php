<?php


namespace App\Http\Middleware;

use App\Codes\ErrorCode;
use Closure;
use App\Exceptions\ApiException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


/**
 * 自定义jwt异常的返回提示
 * Class JsonWebToken
 * @package App\Http\Middleware
 */
class JsonWebToken extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->header('Authorization'))
            throw new ApiException('缺少Token', ErrorCode::LOST_TOKEN);
        try {
            $user = auth()->guard('admin')->userOrFail();
            if(!$user) {
                throw new ApiException('无效Token', ErrorCode::INVALID_TOKEN);
            }
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            throw new ApiException('无效Token', ErrorCode::INVALID_TOKEN);
        }
        return $next($request);
    }
}
