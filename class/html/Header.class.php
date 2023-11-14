<?php
    class Header {
        static function header($booleon){
            $htmlHeader = '
            <header>
                <h1>Record Football</h1>
                <nav>';
            if($booleon){
                $htmlHeader .= '
                <a href="addForm.php" class="addMatch">追加</a>
                <button class="search">検索</button>';
            }else{
                $htmlHeader .= '<a href="home.php" class="toHome">一覧</a>';
            }
            $htmlHeader .= '</nav>
            </header>
            ';
            return $htmlHeader;
        }
    }