<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    {{(isset($site)? (isset($site['namePage'])? $site['namePage'] : '') : '')}}
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{(isset($site)? (isset($site['route'])? $site['route'] : '/') : '/')}}">
                            {{(isset($site)? (isset($site['namePage'])? $site['namePage'] : '') : '')}}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{(isset($site)? (isset($site['namePageParent'])? $site['namePageParent'] : '') : '')}}
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->