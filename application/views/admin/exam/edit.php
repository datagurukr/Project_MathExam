<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate">
                    <label for="no">순번</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>선택</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>코스</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>선택</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>서브코스</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>선택</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>챕터</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate">
                    <label for="course">유닛</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>유닛설명</h6>
                    <textarea id="editor1" name="editor1"></textarea>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            extraPlugins: 'mathjax',
                            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                            height: 300
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
<script>
$(document).ready(function() {
    $('select').material_select();
});
</script>