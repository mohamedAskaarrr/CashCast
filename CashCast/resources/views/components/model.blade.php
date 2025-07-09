<div id="modal" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:#000000aa; z-index:9999; justify-content:center; align-items:center;">
    <div style="background:#2d313c; padding:2rem; border-radius:8px; width:400px; max-width:90%;">
        {{ $slot }}
        <button onclick="document.getElementById('modal').style.display='none'" style="margin-top:1rem;">Close</button>
    </div>
</div>
