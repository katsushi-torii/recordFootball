<?php
    class Header {
        static function header(){
            $htmlHeader = '
            <header>
                <h1>Record Football</h1>
                <nav>
                    <a href="add" class="addMatch">追加</a>
                    <button class="search">検索</button>
                </nav>
            </header>
            ';
            return $htmlHeader;
        }
    }