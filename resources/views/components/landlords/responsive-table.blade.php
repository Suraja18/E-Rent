<section class="users-main-section">
    <div class="tables-notify is-bg-blue-100 top">
        <div class="tables-notify-container">
            <div>
                <b>@if($heading){!! $heading !!}@endif</b>
            </div>
            <a href="@if (isset($links)) {!! $links !!} @endif" class="sidebar-link btn-add-new">
                <span class="sidebar-content-header">
                      Add New 
                </span>
                <div class="sidebar-content-linkitem p-r">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                </div>
            </a>
        </div>
    </div>
    <div class="tables-notify data-table">
        <div class="tables-notify-container">
            <div>
                <b>Showing <select class="table-datas" id="desireSelect"><option value="10">10</option><option value="25">25</option><option value="50">50</option></select> Entries</b>
            </div>
        </div>
    </div>
    <div class="card-tables">
        <div class="p-0">
            <table id="tableResponsive">
                <thead class="landlord-thead">
                    @if($thead){!! $thead !!}@endif
                </thead>
                <tbody>
                    @if($tbody){!! $tbody !!}@endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="tables-notify data-table" id="paginationSection">
        <div class="tables-notify-container">
            <div>
                <b>Showing <span>1</span> to <span>3</span> of <span>3</span> Entries</b>
            </div>
            <div class="d-flex" style="gap: 5px">
                <button type="button" class="form-control table-datas btnsm active">1</button>
                <button type="button" class="form-control table-datas btnsm">2</button>
                <button type="button" class="form-control table-datas btnsm">3</button>
                <button type="button" class="form-control table-datas btnsm">4</button>
            </div>
        </div>
    </div>
</section>