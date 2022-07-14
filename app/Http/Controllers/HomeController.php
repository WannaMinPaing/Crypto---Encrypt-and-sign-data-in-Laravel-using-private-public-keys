<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Crypto\Rsa\KeyPair;
use Illuminate\Support\Facades\Storage;
use Spatie\Crypto\Rsa\PrivateKey;
use Spatie\Crypto\Rsa\PublicKey;

class HomeController extends Controller
{
    public function index()

    {
        //  Part 1

        // [$privateKeyString1, $publicKeyString1] = (new KeyPair())->password('my-password1')->generate();
        // [$privateKeyString2, $publicKeyString2] = (new KeyPair())->password('my-password2')->generate();
        // $pri = PrivateKey::fromString($privateKeyString2,'my-password2');
        // $pub = PublicKey::fromString($publicKeyString2,'my-password2'); 
        // $data = "my secret word";
        // $data = $pri->encrypt($data);
        // dd($pub->decrypt($data));

        // Part 1 End

        // Part 2 

        // [$privateKeyString1, $publicKeyString1] = (new KeyPair())->password('my-password1')->generate();
        // [$privateKeyString2, $publicKeyString2] = (new KeyPair())->password('my-password2')->generate();
        // $signature = PrivateKey::fromString($privateKeyString2,'my-password2')->sign('my message'); // returns a string
        // $publicKey = PublicKey::fromString($publicKeyString2,'my-password2');
        // // dd($publicKey->verify('my message', $signature)); // returns true;
        // dd($publicKey->verify('my modified message', $signature));// returns false;

        //Part 2 End

        // Part 3 End

        // [$privateKeyString1, $publicKeyString1] = (new KeyPair())->password('my-password1')->generate();
        // [$privateKeyString2, $publicKeyString2] = (new KeyPair())->password('my-password2')->generate();
        // $pri = PrivateKey::fromString($privateKeyString2,'my-password2');
        // $pub = PublicKey::fromString($publicKeyString2,'my-password2'); 
        // $data = "my secret word";
        // $data = $pri->encrypt($data);
        // dd($pub->canDecrypt($data));//true
        
        // Part 3 End

        //  File 
         
        $data = "test";
        [$privateKey, $publicKey] = (new KeyPair())->generate($data);     
        // Storage::disk('local')->put('privateFile.txt', $privateKey);
        // Storage::disk('local')->put('publicFile.txt', $publicKey);
        // $path = storage_path('app/file.txt');
        $pathToPrivateKey= storage_path('app/privateFile.txt');
        $pathToPublicKey=storage_path('app/publicFile.txt');
        (new KeyPair())->generate($pathToPrivateKey, $pathToPublicKey);
 

        //Encrypting a message with a private key, decrypting with the public key

        // $data = 'my secret data';
        // $privateKey =  PrivateKey::fromFile($pathToPrivateKey);
        // $encryptedData = $privateKey->encrypt($data); // encrypted data contains something unreadable
        // // dd($encryptedData."Success");
        // $publicKey = PublicKey::fromFile($pathToPublicKey);
        // $decryptedData = $publicKey->decrypt($encryptedData); // decrypted data contains 'my secret data'
        // // dd($decryptedData); // It  is success.
        

        // Encrypting a message with a public key, decrypting with the private key
        // $data = 'my secret data';
        // $publicKey = PublicKey::fromFile($pathToPublicKey);
        // $encryptedData = $publicKey->encrypt($data); // encrypted data contains something unreadable
        // $privateKey = PrivateKey::fromFile($pathToPrivateKey);
        // $decryptedData = $privateKey->decrypt($encryptedData); // decrypted data contains 'my secret data'


        // Check if the data can be decrypted
        // $data = 'my secret data';
        // $privateKey = PrivateKey::fromFile($pathToPrivateKey);
        // $encryptedData = $privateKey->encrypt($data);
        // $dataTureFalse = PublicKey::fromFile($pathToPublicKey)->canDecrypt($encryptedData); // returns a boolean; It is true
        // $dataTureFalse = PrivateKey::fromFile($pathToPrivateKey)->canDecrypt($encryptedData); // returns a boolean; It is false


        //Signing and verifying data
        $signature = PrivateKey::fromFile($pathToPrivateKey)->sign('my message'); // returns a string
        // dd($signature);
        $publicKey = PublicKey::fromFile($pathToPublicKey);
        // dd($publicKey->verify('my message', $signature)); // returns true;
        dd($publicKey->verify('my modified message', $signature)); // returns false;

        
    }
}
 