<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="1" type="text" class="validate">
                    <label for="no">순번</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="강동원" type="text" class="validate">
                    <label for="no">작성자</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="2017-05-21" type="text" class="validate">
                    <label for="no">작성일</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="한달 이용가가 어떻게 되나요?" type="text" class="validate">
                    <label for="no">제목</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea disabled id="textarea1" class="materialize-textarea"></textarea>
                    <label for="textarea1">내용</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>답글</h6>
                    <textarea id="editor1" name="editor1"></textarea>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            extraPlugins: 'mathjax',
                            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                            height: 100
                        } );

                        if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                            document.getElementById( 'ie8-warning' ).className = 'tip alert';
                        }
                    </script>                            
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <a class="waves-effect waves-light btn right">적용</a>
                </div>
                <div class="input-field col s6">
                    <a class="waves-effect waves-light btn left">취소</a>
                </div>
            </div>
        </form>
    </div>
</div>