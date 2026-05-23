<?php
class LogoService {
    public function fetchFromWebsite(){
        $targets=['https://tisser.pt/wp-content/uploads/logo.png','https://tisser.pt/favicon.ico'];
        foreach($targets as $url){
            $data=@file_get_contents($url);
            if($data){ $ext=strpos($url,'.ico')!==false?'ico':'png'; file_put_contents(__DIR__.'/../../public/assets/img/logo-tisser.'.$ext,$data); return true; }
        }
        return false;
    }
}
