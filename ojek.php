<?php

error_reporting(0);

if (!file_exists('token')) {

    mkdir('token', 0777, true);

}

include ("top.php");

echo "\n";

echo "\e[94m            NOT SAFE FOR WORK IF2               \n";

echo "\e[93m MASIH JAMAN NUNGGU ORDERAN = INI SOLUSINYA\n";

echo "\n";

echo "\e[96m[?] Masukkan Nomor HP Zaiyang (US only) : ";

$nope = trim(fgets(STDIN));

$register = register($nope);

if ($register == false)

    {

    echo "\e[91m[x] Nomor Telah Terdaftar\n";

    }

  else

    {

    otp:

    echo "\e[96m[!] Masukkan Kode Verifikasi (OTP) : ";

    $otp = trim(fgets(STDIN));

    $verif = verif($otp, $register);

    if ($verif == false)

        {

        echo "\e[91m[x] Kode Verifikasi Salah\n";

        goto otp;

        }

      else

        {

        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);

        echo "\e[93m[!] Trying to redeem Voucher : GOFOODSANTAI19 !\n";

        sleep(3);

        $claim = claim($verif);

        if ($claim == false)

            {

            echo "\e[92m[!]".$voucher."\n";

            sleep(3);

            echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";

            sleep(3);

            goto next;

            }

            else{

                echo "\e[92m[+] ".$claim."\n";

                sleep(3);

                echo "\e[93m[!] Trying to redeem Voucher : COBAINGOJEK !\n";

                sleep(3);

                goto ride

                

                }

                

            ride:

            $claim = ride($verif);

            if ($claim == false ) {

                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";

                sleep(3);

                echo "\e[93m[!] Trying to redeem Voucher : AYOCOBAGOJEK !\n";

                sleep(3);

            }

            else{

                echo "\e[92m[+] ".$claim."\n";

                sleep(3);

                echo "\e[93m[!] Trying to redeem Voucher : AYOCOBAGOJEK !\n";

                sleep(3);

                goto pengen;

            }

            pengen:

            $claim = cekvocer($verif);

            if ($claim == false ) {

                echo "\033VOUCHER INVALID/GAGAL REDEEM\n";

            }

            else{

                echo "\e[92m[+] ".$claim."\n";

                

        }

    }

    }

?>
