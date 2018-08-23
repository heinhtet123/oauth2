<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Product as ProductResource;

use Firebase\JWT\JWT;
use Lcobucci\JWT\Parsing\Decoder;

// use UMA\Psr7Hmac\Signer;
// use UMA\Psr7Hmac\Verifier;


class ResourceController extends Controller
{
    

    function get(Request $request)
    {
    	$jwt="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhmMzcyODQxMmNhZjAzMmRiMWY5MjM5OGRmZTkwMDI3NDBkYjNhODAwMWZiZWQ4MjNjNzY5M2U2MTljZGZiOTI5ODdhNTQ3NjY5Y2QwOGM2In0.eyJhdWQiOiI1IiwianRpIjoiOGYzNzI4NDEyY2FmMDMyZGIxZjkyMzk4ZGZlOTAwMjc0MGRiM2E4MDAxZmJlZDgyM2M3NjkzZTYxOWNkZmI5Mjk4N2E1NDc2NjljZDA4YzYiLCJpYXQiOjE1MzQ0OTI4MjMsIm5iZiI6MTUzNDQ5MjgyMywiZXhwIjoxNTY2MDI4ODIzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Nh4JTBtrJbZTe2zDvJol2hDAfBBIORy1E9fRnNzQzdMAO_YpC98sw_BujNC08fCSL9km671xxcHxWXwDFAWZB3OFmiMlkO8X9Te3YAwGIep5GINxGl3R3vCzJWESd2-kdKOxERyIS4Uol9KSKKFDHteOPBlIvASWjJ5mtmLK4NAiQRj2xQ13gAtOlx4aKv_JGzYsbrdlB-SNOtW6ENGzY9taMWnfUJ3GyKwQSQkPV8gn5MdG3D31zdc5DtrKmC_TWwCq2Dmp0FolV_0Kxo8LjmBCRX8GnNGCd6gO_pkBGAkn6KS5b3az3r79rtUxVZPRVm9OHUGNZMlrwee3qEYd-6bkHC973SDZ54ORKIDIgDCJQVJJ3taltr3qHfkD_BEclPBXH_7eW6r7cUWO3p7xBFlj_fxA1L6WckGX5h8_ZJKSsCpYNVRThfYQ08RsPQSM9wo8I7yI_ZoUQEKsTVX9JFWz1J4kqM7bmxJayNbSvu9s8BKzkwBSxua8nt_MByoP899oZ5tejbqyYh7ymX-YFH0JDuskluPYnFaOjqpQJxn0V6ezGxPjS1y707YdCNzGs_ZnBfpS9ohSDZIWdB9oTcEneWgs0bQS085d4BuTqu8Kz4FbeCCN9L94hcg-g5-txe4ZinhwvBXVEb0OClp1_TrNwUHm1rkEnUxRrtBjjHY";

    	// $algo="sha256";
    	$algo="HS256";
    	

    	$secret="sGmO4zjUyKC92eeCO1nXsXG5I41iIboELAslWQeV";

    	// $secret="-----BEGIN PRIVATE KEY-----\nAHF13F3vV5ulOPAnsU8wnn6ivTpdD2R8ybwohZQu\n-----END PRIVATE KEY-----\n";



    	$return=$this->verifyJWT($algo,$jwt,$secret);

    	dd($return);


    	return new ProductResource([]);
    }

    function verifyJWT(string $algo, string $jwt,$secret)
	{
	    list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode('.', $jwt);

	    $dataEncoded = "$headerEncoded.$payloadEncoded";
	 	
	    
	    $signature = JWT::decode($jwt, $secret, array('RS256'));
	    dd($signature);

	    // $signature=$decoder->decode($jwt,$secret,array('HS256'));
	    
	    // $decoder = new Decoder();
	    // $signature=$decoder->base64UrlDecode($signatureEncoded);

	    // $signature = base64UrlDecode($signatureEncoded);
	 
	    $rawSignature = hash_hmac($algo, $dataEncoded, $secret, true);



	 
	    return hash_equals($rawSignature, $signature);
	}

}