<div class="section">
    <div class="row">
        <form class="col s12">
            <h4>챕터(상세)</h4>
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
                    <input type="text" class="validate">
                    <label for="course">챕터</label>
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