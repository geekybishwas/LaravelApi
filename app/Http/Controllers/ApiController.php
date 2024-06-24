<?php


namespace app\Http\Controllers;


class ApiController extends Controller
{
    protected function successResponse(
        $posts,$message='Success',$status=200
    ){
        return response()->json([
            'message'=>$message,
            'posts'=>$posts
        ],$status);
    }

    protected function errorResponse($message='Error',$status=400){
        return response()->json([
            'message'=>$message
        ],$status);
    }
}