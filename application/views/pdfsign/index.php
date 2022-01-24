<div class="toolbar">
    <div class="tool">
        <span><?= $judulPDF; ?>
            <?php echo 'e-Sign 4.0'; ?>
            <input type="text" id="judulPDF" name="judulPDF" style="display:none;" class="form-control" value="<?= $judulPDF; ?>">
            <input type="text" id="savepdfname" name="savepdfname" style="display:none;" class="form-control" value="<?= $pdfnamesignin; ?>">
        </span>
    </div>
    <!-- <div class="tool">
        <label for="">Brush size</label>
        <input type="number" class="form-control text-right" value="1" id="brush-size" max="50">
    </div>
    <div class="tool">
        <label for="">Font size</label>
        <select id="font-size" class="form-control">
            <option value="10">10</option>
            <option value="12">12</option>
            <option value="16" selected>16</option>
            <option value="18">18</option>
            <option value="24">24</option>
            <option value="32">32</option>
            <option value="48">48</option>
            <option value="64">64</option>
            <option value="72">72</option>
            <option value="108">108</option>
        </select>
    </div>
    <div class="tool">
        <button class="color-tool active" style="background-color: #212121;"></button>
        <button class="color-tool" style="background-color: red;"></button>
        <button class="color-tool" style="background-color: blue;"></button>
        <button class="color-tool" style="background-color: green;"></button>
        <button class="color-tool" style="background-color: yellow;"></button>
    </div> -->
    <div class="tool">
        <button class="tool-button active"><i class="fas fa-hand-paper" title="Free Hand" onclick="enableSelector(event)"></i></button>
    </div>
    <div class="tool">
        <button class="tool-button"><i class="fas fa-pencil-alt" title="Pencil" onclick="enablePencil(event)"></i></button>
    </div>
    <!-- <div class="tool">
		<button class="tool-button"><i class="fa fa-font" title="Add Text" onclick="enableAddText(event)"></i></button>
	</div> -->
    <!-- <div class="tool">
		<button class="tool-button"><i class="fa fa-long-arrow-right" title="Add Arrow" onclick="enableAddArrow(event)"></i></button>
	</div>
	<div class="tool">
		<button class="tool-button"><i class="fa fa-square-o" title="Add rectangle" onclick="enableRectangle(event)"></i></button>
	</div> -->
    <div class="tool">
        <button class="tool-button"><i class="far fa-images" title="Add an Image" onclick="addImage(event)"></i></button>
    </div>
    <div class="tool">
        <button class="btn btn-danger btn-sm" onclick="deleteSelectedObject(event)"><i class="fa fa-trash"></i></button>
    </div>
    <div class="tool">
        <button class="btn btn-danger btn-sm" onclick="clearPage()">Clear Page</button>
    </div>
    <!-- <div class="tool">
		<button class="btn btn-info btn-sm" onclick="showPdfData()">{}</button>
	</div> -->
    <div class="tool">
        <button class="btn btn-light btn-sm" onclick="savePDF()"><i class="fa fa-save"></i> Send</button>
        <button class="btn btn-light btn-sm" onclick="cancelPDF()" <?= logActivity($user['user_id'], 'Onlyme', 'Cancel document'); ?><i class="far fa-window-close"></i> Cancel</button>
    </div>
</div>
<div id="pdf-container"></div>

<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalLabel">PDF annotation data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre class="prettyprint lang-json linenums">
				</pre>
            </div>
        </div>
    </div>
</div>