<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    Public function assetSearch()
    {

    }

    Public function peripheralsSearch()
    {
    	$q = Input::get ( 'q' );
    if($q != ""){
    $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
    $pagination = $user->appends ( array (
                'q' => Input::get ( 'q' ) 
        ) );
    if (count ( $user ) > 0)
        return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
    }
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
}

}
