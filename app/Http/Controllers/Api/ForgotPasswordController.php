<?php

namespace App\Http\Controllers\Api;

use App\Event\Transformers\JsonTransformer;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends ApiController
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     * @param JsonTransformer $transformer
     */
    public function __construct(JsonTransformer $transformer)
    {
        $this->transformer = $transformer;
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function reset(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        return $response == Password::RESET_LINK_SENT
            ? $this->respondWithTransformer(['message' => 'Reset link sent to your email.', 'status' => true], 201)
            : $this->respondWithTransformer(['message' => 'Unable to send reset link', 'status' => false], 401);
    }
}