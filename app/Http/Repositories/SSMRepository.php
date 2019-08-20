<?php


namespace App\Http\Repositories;


class SSMRepository
{
    public $getShouldReplaceWordPosition = array();

    public $getShouldReplaceWord = array();

    public $defaultMessage = "This is my mobile numebr zero 1 eight three 1 5 nine one 66";

    public function index($message = null )
    {
        if ($message ){
            return $this->doesContainStopword($message);
        }

        return $this->doesContainStopword($this->defaultMessage);
    }

    /**
     * Check whether this message contain
     * any kinds of stop word or not.
     *
     * @param $message
     * @return array|int
     */
    public function doesContainStopword($message)
    {
        $containContact          =  0;
        $lengthOfWords           = '';
        $stopWordPosition        = array();
        $puttingStopWordsTogether= array();
        $listOfStopWords         = [
            'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven',
            'eight', 'nine', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam',
            'tujuh', 'lapan', 'sembilan', 'kosong', 'dot', '@', '[at]', 'whatsapp',
            'wechat', 'skype', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
        ];
        $numbersInChinese        = ['零', '一', '二', '三', '四', '五', '六', '七', '八', '九'];
        $numbersInEnglish        = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        $numbersInMalay          = ['kosong', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'lapan', 'sembilan'];
        $emailFormat             = [
            'dot', '@', '[at]', 'gmail', 'yahoo', 'outlook', 'hotmail', 'yandex', 'email',
            'zoho', 'mail', 'gmx', 'protonmail', 'aol', 'tutanota'
        ];
        $socialMediaName         = [
            'facebook', 'fb', 'twitter', 'meetme', 'googleplus',
            'myspace', 'tagged', 'twoo', 'instagram', 'insta', 'likealittle',
            'snapchat', 'wechat', 'messanger', 'whatsapp', 'skype', 'e.mai.l', 'emai.l', 'em.ai.l', 'e.m.i.l',
            'viber', 'line', 'bbm', 'kik', 'qq', 'linne', 'ig', //ig = Instagram
            'li.ne', 'we.cht', 'wc', 'wheecht', 'sk.ype',
            'wchat', 'wcht', 'wct', 'weecht',
            'vchat', 'imo',
            'kakaotalk', '微信', '微博', '面子书', '面书', '推特',
        ];
        $numContactNumber        = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        // slicing the words
        $wordsInArray = explode(" ", $message);
        $lengthOfWords = count($wordsInArray);

        // removing all the whitespace and backspace.
        $msgWithoutSpace = str_replace(' ', '', $message);

        // check whether message contain any kind of social media name i.e. whatsapp
        foreach($socialMediaName as $words){
            if(stripos($msgWithoutSpace, 'alright') !== false OR stripos($msgWithoutSpace, 'right') !== false OR stripos($msgWithoutSpace, 'night') !== false OR stripos($msgWithoutSpace, 'iguess') !== false OR stripos($msgWithoutSpace, 'igot') !== false OR stripos($msgWithoutSpace, 'iget') !== false){
                $containContact = 0;
            }
            else if(stripos($msgWithoutSpace, $words) !== false){
                $containContact = 1;
            }
        }

        //replace zero one two instead of 0 1 2
        $getShouldReplaceWord = array();
        $getShouldReplaceWordPosition = array();

        // convert English words (zero, one) to number
        foreach($numbersInEnglish as $key => $engNum){
            foreach ($wordsInArray as $wordKey => $word) {
                if($engNum === strtolower($word)){
                    array_push($getShouldReplaceWord, $word);
                    array_push($getShouldReplaceWordPosition, $key);
                }
            }
        }

        // convert Malay words (kosong, satu) to number
        foreach($numbersInMalay as $key => $myNum){
            foreach ($wordsInArray as $wordKey => $word) {
                if($myNum === strtolower($word)){
                    array_push($getShouldReplaceWord, $word);
                    array_push($getShouldReplaceWordPosition, $key);
                }
            }
        }

        // convert Chines words (零, 一) to number
        foreach($numbersInChinese as $key => $myNum){
            foreach ($wordsInArray as $wordKey => $word) {
                if($myNum === strtolower($word)){
                    array_push($getShouldReplaceWord, $word);
                    array_push($getShouldReplaceWordPosition, $key);
                }
            }
        }

        //check whether message contains more than 3 numbers or not
        // if any message contain 3 numbers, will be blocked
        $countNoOfNumbers = preg_match_all( "/[0-9]/", implode("",$getShouldReplaceWordPosition) );

        if ($countNoOfNumbers > 2) {
            $containContact = 1;
        }

        // check does Malay message contain more than 2 numbers or not
        $replaceTextByNumbers = str_replace($numbersInMalay, $numContactNumber, $msgWithoutSpace);
        $countNoOfNumbersInText = preg_match_all( "/[0-9]/", $replaceTextByNumbers );

        if ($countNoOfNumbersInText > 2) {
            $containContact = 1;
        }

        // check does English message contain more than 2 numbers or not
        $replaceTextByNumbersInMalay = str_replace($numbersInEnglish, $numContactNumber, $msgWithoutSpace);
        $countNoOfNumbersInTextInMalay = preg_match_all( "/[0-9]/", $replaceTextByNumbersInMalay );

        if ($countNoOfNumbersInTextInMalay > 2) {
            $containContact = 1;
        }

        // check does Chinese message contain more than 2 numbers or not
        $replaceTextByNumbersInChinese = str_replace($numbersInChinese, $numContactNumber, $msgWithoutSpace);
        $countNoOfNumbersInTextInChinese = preg_match_all( "/[0-9]/", $replaceTextByNumbersInChinese );

        if ($countNoOfNumbersInTextInChinese > 2) {
            $containContact = 1;
        }

        $replacedWordsInArray = str_replace($getShouldReplaceWord, $getShouldReplaceWordPosition, $wordsInArray);
        $wordsWithoutSpaceForNumber = implode("", $replacedWordsInArray);

        // Check does message contain 01 together
        if(stripos($wordsWithoutSpaceForNumber, '01') !== false){
            $positionAt = stripos($wordsWithoutSpaceForNumber, '01');
            $xplodeTextAt = str_split($wordsWithoutSpaceForNumber);

            if( ($xplodeTextAt[$positionAt+1] == 1 OR $xplodeTextAt[$positionAt+1] == 2 OR $xplodeTextAt[$positionAt+1] == 3 OR $xplodeTextAt[$positionAt+1] == 4 OR $xplodeTextAt[$positionAt+1] == 5 OR $xplodeTextAt[$positionAt+1] == 6 OR $xplodeTextAt[$positionAt+1] == 7 OR $xplodeTextAt[$positionAt+1] == 8 OR $xplodeTextAt[$positionAt+1] == 9 OR $xplodeTextAt[$positionAt+1] == 0 ) ){
                $containContact = 1;
            }
        }

        // Check does message contain any email words, like gmail, yahoo.
        foreach($emailFormat as $words){
            if(stripos($msgWithoutSpace, $words) !== false){
                $containContact = 1;
            }
        }

        // checking whether message contain any form of mobile number or not i.e. 0183000000
        if(stripos($msgWithoutSpace, '01') !== false){
            $position = stripos($msgWithoutSpace, '01');
            $xplodeText = str_split($msgWithoutSpace);

            if((
                $xplodeText[$position+1] == 1 OR
                $xplodeText[$position+1] == 2 OR
                $xplodeText[$position+1] == 3 OR
                $xplodeText[$position+1] == 4 OR
                $xplodeText[$position+1] == 5 OR
                $xplodeText[$position+1] == 6 OR
                $xplodeText[$position+1] == 7 OR
                $xplodeText[$position+1] == 8 OR
                $xplodeText[$position+1] == 9 OR
                $xplodeText[$position+1] == 0 ))
            {
                $containContact = 1;
            }
        }

        // putting all the suspected words in an array
        foreach ($wordsInArray as $wordKey => $word) {
            if(is_numeric($word) === TRUE ){
                array_push($puttingStopWordsTogether, $word);
            }

            // checking whether this word is stopword or not
            $isThatStopWord = in_array($word, $listOfStopWords);

            if(!empty($isThatStopWord)){
                // putting stop word in array
                array_push($puttingStopWordsTogether, $word);
                array_push($stopWordPosition, $wordKey);
            }
        }

        return $containContact;
    }
}