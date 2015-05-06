<?php
class Routee extends CI_Controller {
    function tipsandtools()
    {
        header("Location: http://181.224.137.174/~frumcare/dev/blog/resources/advices/", false);
        exit;
    }
    
    function ratecalculator()
    {
        header("Location: http://181.224.137.174/~frumcare/dev/blog/resources/rate-calculator/");
        exit;
    }
    
    function faq()
    {
        header("Location: http://181.224.137.174/~frumcare/dev/blog/resources/faq/");
        exit;
    }
    
    function safetyguide()
    {
        header("Location: http://181.224.137.174/~frumcare/dev/blog/resources/safety-guide/");
        exit;
    }
    
    function backgroundcheck()
    {
        header("Location: http://181.224.137.174/~frumcare/dev/blog/resources/background-check/");
        exit;
    }
    
    //function tipsandtools()
   // {
   //     header("Location: http://181.224.137.174/~frumcare/dev/blog/resources/advices/for-family/");
    //    exit;
    //}
    
    //function tipsandtools()
    //{
    //    header("Location: http://181.224.137.174/~frumcare/dev/blog/resources/advices/for-family/");
    //    exit;
   // }
}