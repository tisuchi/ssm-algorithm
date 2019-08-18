<?php


namespace App\Http\Repositories;


class SSMRepository
{
    public function index()
    {
        return $this->doesContainStopword("My number is zero");
    }

    public function doesContainStopword($message)
    {
        $containContact          =  0;
        $lengthOfWords           = '';
        $stopWordPosition        = array();
        $puttingStopWordsTogether= array();
        $listOfStopWords         = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'lapan', 'sembilan', 'kosong', 'dot', '@', '[at]', 'whatsapp', 'wechat', 'skype', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $numbersInChinese        = ['零', '一', '二', '三', '四', '五', '六', '七', '八', '九'];
        $numbersInEnglish        = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        $numbersInMalay          = ['kosong', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'lapan', 'sembilan'];
        $emailFormat             = ['dot', '@', '[at]', 'gmail', 'yahoo', 'outlook', 'hotmail', 'yandex', 'email'];
        $socialMediaName         = [
            'facebook', 'fb', 'twitter', 'meetme', 'googleplus',
            'myspace', 'tagged', 'twoo', 'instagram', 'insta', 'likealittle',
            'snapchat', 'wechat', 'messanger', 'whatsapp', 'skype', 'e.mai.l', 'emai.l', 'em.ai.l', 'emai.l',
            'viber', 'line', 'bbm', 'kik', 'qq', 'linne', 'ig', //ig = Instagram
            'li.ne', 'we.cht', 'wc', 'wheecht', 'sk.ype',
            'wchat', 'wcht', 'wct', 'weecht', 'atdrieana92', 'maya', 'maya_atdrieana92', //for particular this user's (13724) instagram ID. Its for temporary
            'vchat',
            'kakaotalk', '微信', '微博', '面子书', '面书', '推特',
        ];
        $numContactNumber        = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        // slicking words and put into an array
        $wordsInArray = explode(" ", $message);
        $lengthOfWords = count($wordsInArray);
        // taking all the spaces and putting togethers
        $msgWithoutSpace = str_replace(' ', '', $message);
        // checking if message contain any social media name i.e. whatsapp
        foreach($socialMediaName as $words){
            // thim's piece of code - tired of approving blocked message containing these words, it's vulnerable because when it detects words below will return success and let say user types = alright my phone num is 3910432 - it will go through
            if(stripos($msgWithoutSpace, 'alright') !== false OR stripos($msgWithoutSpace, 'right') !== false OR stripos($msgWithoutSpace, 'night') !== false OR stripos($msgWithoutSpace, 'iguess') !== false OR stripos($msgWithoutSpace, 'igot') !== false OR stripos($msgWithoutSpace, 'iget') !== false){
                $containContact = 0;
            }
            elseif(stripos($msgWithoutSpace, $words) !== false){
                $containContact = 1;
            }
        }
        //replace zero one two instead of 0 1 2
        $getShouldReplaceWord = array();
        $getShouldReplaceWordPosition = array();
        // for english numbers i.e. zero one
        foreach($numbersInEnglish as $key => $engNum){
            foreach ($wordsInArray as $wordKey => $word) {
                if($engNum === strtolower($word)){
                    array_push($getShouldReplaceWord, $word);
                    array_push($getShouldReplaceWordPosition, $key);
                }
            }
        }
        // for Malay numbers i.e. kosong satu
        foreach($numbersInMalay as $key => $myNum){
            foreach ($wordsInArray as $wordKey => $word) {
                if($myNum === strtolower($word)){
                    array_push($getShouldReplaceWord, $word);
                    array_push($getShouldReplaceWordPosition, $key);
                }
            }
        }
        // for Chinese numbers i.e. 零, 一
        foreach($numbersInChinese as $key => $myNum){
            foreach ($wordsInArray as $wordKey => $word) {
                if($myNum === strtolower($word)){
                    array_push($getShouldReplaceWord, $word);
                    array_push($getShouldReplaceWordPosition, $key);
                }
            }
        }
        //check if any message contains more than 3 numbers or not
        // if any message contain 3 numbers, will be blocked
        $countNoOfNumbers = preg_match_all( "/[0-9]/", implode("",$getShouldReplaceWordPosition) );
        if ($countNoOfNumbers > 2) {
            $containContact = 1;
        }
        //replace numbers (in word) if not found as word in Malay
        $replaceTextByNumbers = str_replace($numbersInMalay, $numContactNumber, $msgWithoutSpace);
        $countNoOfNumbersInText = preg_match_all( "/[0-9]/", $replaceTextByNumbers );
        if ($countNoOfNumbersInText > 2) {
            $containContact = 1;
        }
        //replace numbers (in word) if not found as word in English
        $replaceTextByNumbersInMalay = str_replace($numbersInEnglish, $numContactNumber, $msgWithoutSpace);
        $countNoOfNumbersInTextInMalay = preg_match_all( "/[0-9]/", $replaceTextByNumbersInMalay );
        if ($countNoOfNumbersInTextInMalay > 2) {
            $containContact = 1;
        }
        //replace numbers (in word) if not found as word in Chinese
        $replaceTextByNumbersInChinese = str_replace($numbersInChinese, $numContactNumber, $msgWithoutSpace);
        $countNoOfNumbersInTextInChinese = preg_match_all( "/[0-9]/", $replaceTextByNumbersInChinese );
        if ($countNoOfNumbersInTextInChinese > 2) {
            $containContact = 1;
        }
        $replacedWordsInArray = str_replace($getShouldReplaceWord, $getShouldReplaceWordPosition, $wordsInArray);
        $wordsWithoutSpaceForNumber = implode("", $replacedWordsInArray);
        //checking if message contains 01 together
        if(stripos($wordsWithoutSpaceForNumber, '01') !== false){
            $positionAt = stripos($wordsWithoutSpaceForNumber, '01');
            $xplodeTextAt = str_split($wordsWithoutSpaceForNumber);
            if( ($xplodeTextAt[$positionAt+1] == 1 OR $xplodeTextAt[$positionAt+1] == 2 OR $xplodeTextAt[$positionAt+1] == 3 OR $xplodeTextAt[$positionAt+1] == 4 OR $xplodeTextAt[$positionAt+1] == 5 OR $xplodeTextAt[$positionAt+1] == 6 OR $xplodeTextAt[$positionAt+1] == 7 OR $xplodeTextAt[$positionAt+1] == 8 OR $xplodeTextAt[$positionAt+1] == 9 OR $xplodeTextAt[$positionAt+1] == 0 ) ){
                $containContact = 1;
            }
        }
        //checking whether message contain any word for email or not
        foreach($emailFormat as $words){
            if(stripos($msgWithoutSpace, $words) !== false){
                $containContact = 1;
            }
        }
        // checking whether message contain any mobile number or not i.e. 0183000000
        if(stripos($msgWithoutSpace, '01') !== false){
            $position = stripos($msgWithoutSpace, '01');
            $xplodeText = str_split($msgWithoutSpace);
            if( ($xplodeText[$position+1] == 1 OR $xplodeText[$position+1] == 2 OR $xplodeText[$position+1] == 3 OR $xplodeText[$position+1] == 4 OR $xplodeText[$position+1] == 5 OR $xplodeText[$position+1] == 6 OR $xplodeText[$position+1] == 7 OR $xplodeText[$position+1] == 8 OR $xplodeText[$position+1] == 9 OR $xplodeText[$position+1] == 0 ) ){
                $containContact = 1;
            }
        }
        // putting all the suspected words from message in an array
        foreach ($wordsInArray as $wordKey => $word) {
            if(is_numeric($word) === TRUE ){
                array_push($puttingStopWordsTogether, $word);
            }
            //checking whether this word is stopword or not
            $isThatStopWord = in_array($word, $listOfStopWords);
            if(!empty($isThatStopWord)){
                //putting stop word in array
                array_push($puttingStopWordsTogether, $word);
                array_push($stopWordPosition, $wordKey);
            }
        }
        return $containContact;
    }
}