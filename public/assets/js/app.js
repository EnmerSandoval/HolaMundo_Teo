
(function(){
  const $ = (sel,root=document)=>root.querySelector(sel);
  const $$ = (sel,root=document)=>Array.from(root.querySelectorAll(sel));

  function toast(msg, timeout=2600){
    let wrap = $('.toast'); if(!wrap){ wrap = document.createElement('div'); wrap.className='toast'; document.body.appendChild(wrap); }
    const t = document.createElement('div'); t.className='t'; t.textContent = msg;
    wrap.appendChild(t); setTimeout(()=>{ t.remove(); }, timeout);
  }
  window._toast = toast;

  function modalConfirm(message, onYes){
    let backdrop = $('.modal-backdrop');
    if(!backdrop){
      backdrop = document.createElement('div');
      backdrop.className = 'modal-backdrop';
      backdrop.innerHTML = `
        <div class="modal" role="dialog" aria-modal="true">
          <h4>¿Confirmar?</h4>
          <p class="msg"></p>
          <div class="modal-actions">
            <button class="btn ghost">Cancelar</button>
            <button class="btn primary">Sí</button>
          </div>
        </div>`;
      document.body.appendChild(backdrop);
    }
    $('.msg', backdrop).textContent = message || '¿Estás seguro?';
    backdrop.classList.add('show');
    const [btnCancel, btnYes] = $$('.modal-actions .btn', backdrop);
    function close(){ backdrop.classList.remove('show'); }
    btnCancel.onclick = ()=>{ close(); };
    btnYes.onclick = ()=>{ try{ onYes&&onYes(); } finally { close(); toast('Acción realizada'); } };
  }

  function hookDestroyLinks(){
    $$("a[href*='a=destroy']").forEach(a=>{
      a.addEventListener('click', (ev)=>{
        ev.preventDefault();
        modalConfirm('Esta acción no se puede deshacer.', ()=>{ window.location.href = a.href; });
      });
    });
  }

  function hookSearchables(){
    $$('[data-table-search]').forEach(input=>{
      const table = input.closest('.card, .table-wrap')?.querySelector('table');
      if(!table) return;
      input.addEventListener('input', ()=>{
        const q = input.value.trim().toLowerCase();
        const rows = $$('tbody tr', table);
        rows.forEach(tr=>{
          const hit = tr.textContent.toLowerCase().includes(q);
          tr.style.display = hit ? '' : 'none';
        });
      });
    });
  }

  function hookSortable(){
    $$('th[data-sort]').forEach(th=>{
      th.style.cursor = 'pointer';
      th.addEventListener('click', ()=>{
        const table = th.closest('table');
        const idx = Array.from(th.parentNode.children).indexOf(th);
        const rows = Array.from(table.tBodies[0].rows);
        const asc = !(th.dataset.order==='asc');
        rows.sort((a,b)=>{
          const A = a.cells[idx].innerText.trim();
          const B = b.cells[idx].innerText.trim();
          const nA = parseFloat(A.replace(/[^\d.-]/g,''));
          const nB = parseFloat(B.replace(/[^\d.-]/g,''));
          if(!isNaN(nA) && !isNaN(nB)){ return asc ? nA - nB : nB - nA; }
          return asc ? A.localeCompare(B) : B.localeCompare(A);
        });
        rows.forEach(r=>table.tBodies[0].appendChild(r));
        th.dataset.order = asc ? 'asc' : 'desc';
      });
    });
  }

  document.addEventListener('DOMContentLoaded', ()=>{
    hookDestroyLinks();
    hookSearchables();
    hookSortable();
    const firstSearch = document.querySelector('[data-table-search]');
    if(firstSearch){ toast('Tip: usa el buscador para filtrar filas'); }
  });
})();
