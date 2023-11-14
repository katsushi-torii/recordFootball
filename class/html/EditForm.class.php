<?php
    class EditForm {
        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="../css/style.css">
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                crossorigin="anonymous"></script>
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function title(){
            $htmlTitle = '
            <main class="edit">
            <article>
                <h3>試合を編集</h3>
            </article>
            ';
            return $htmlTitle;
        }

        static function form($match){
            $htmlForm = '
            <section>
                <form action="" method="POST" class="addForm">
                    <aside>
                        <label for="matchDate">試合日：</label>
                        <input type="date" name="matchDate" id="matchDate" value="'.$match->matchDate.'">
                    </aside>
                    <aside>
                        <label for="star">評価(5点満点)：</label>
                        <input type="number" name="star" id="star" value="'.$match->star.'">
                    </aside>
                    <aside>
                        <label for="competetion">大会：</label>
                        <input type="text" name="competition" id="competition"  value="'.$match->competition.'">
                    </aside>
                    <aside>
                        <label for="competetion">節・回戦：</label>
                        <input type="text" name="leg" id="leg" value="'.$match->leg.'">
                    </aside>
                    <aside>
                        <label for="teamA">チーム１：</label>
                        <input type="text" name="teamA" id="teamA" value="'.$match->teamA.'">
                    </aside>
                    <aside>
                        <label for="scoreA">チーム１の点数：</label>
                        <select name="scoreA" id="scoreA">
                        </select>
                    </aside>
                    <aside>
                        <label for="scorerA">チーム１の得点者：</label>
                        <aside class="scorerA"></aside>
                    </aside>
                    <aside>
                        <label for="teamB">チーム２：</label>
                        <input type="text" name="teamB" id="teamB" value="'.$match->teamB.'">
                    </aside>
                    <aside>
                        <label for="scoreB">チーム２の点数：</label>
                        <select name="scoreB" id="scoreB">
                        </select>
                    </aside>
                    <aside>
                        <label for="scorerB">チーム２の得点者：</label>
                        <aside class="scorerB"></aside>
                    </aside>
                    <aside>
                        <label for="comment">自由記述：</label>
                        <textarea name="comment" id="comment">'.$match->comment.'</textarea>
                    </aside>
                    <button onsubmit="">編集</button>
                </form>
            </section>
            ';
            return $htmlForm;
        }

        static function script($match){
            $htmlScript = '
                    </main>
                </body>
                <script>
                    for(let i = 0; i < 16; i++){
                        let newOption = $(`
                            <option value="${i}">${i}</option>
                        `);
                        $("#scoreA").append(newOption);
                        let newOptionB = $(`
                            <option value="${i}">${i}</option>
                        `);
                        $("#scoreB").append(newOptionB);
                    }
                    //得点数を取得、その得点数が最初選択されて、その数に応じた得点者欄が表示
                    $("#scoreA option").eq('.$match->scoreA.').prop("selected","selected");
                    const scorersA = "'.$match->scorerA.'".split(", ");
                    const scorersB = "'.$match->scorerB.'".split(", ");
                    for(let i = 0; i < $("#scoreA").val(); i++){
                        let newInput = $(`     
                            <input type="text" name="scorerA${i}" id="scorerA${i}" value="${scorersA[i]}" required>
                        `);
                        $(".scorerA").append(newInput);
                    }
                    $("#scoreB option").eq('.$match->scoreB.').prop("selected","selected");
                    for(let i = 0; i < $("#scoreB").val(); i++){
                        let newInput = $(`     
                            <input type="text" name="scorerB${i}" id="scorerB${i}" value="${scorersB[i]}" required>
                        `);
                        $(".scorerB").append(newInput);
                    }
                    $("#scoreA").on("change", function(){
                        $(".scorerA input").remove();
                        for(let i = 0; i < $("#scoreA").val(); i++){
                            let newInput = $(`     
                                <input type="text" name="scorerA${i}" id="scorerA${i}" value="${scorersA[i]}" required>
                            `);
                            $(".scorerA").append(newInput);
                        }
                    })
                    $("#scoreB").on("change", function(){
                        $(".scorerB input").remove();
                        for(let i = 0; i < $("#scoreB").val(); i++){
                            let newInput = $(`     
                                <input type="text" name="scorerB${i}" id="scorerB${i}" value="${scorersB[i]}" required>
                            `);
                            $(".scorerB").append(newInput);
                        }
                    })
                </script>
            </html>
            ';
            return $htmlScript;
        }
    }