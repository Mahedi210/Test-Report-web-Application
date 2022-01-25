@extends('admin.amaster')
@section('content')

    <form class="form-edit-add" role="form" id="report_form"
          action="{{route('report.view')}}"
          method="GET" enctype="multipart/form-data"
          autocomplete="off">
        <div class="row mt-3">
            <div class="col-lg-3 col-md-8 col-sm-12">
                <div class="form-group">
                    <label for="title">
                        Date From
                        <span class="required"></span>
                    </label>
                    <input type="date" name="date_from"
                           id="date_from"
                           value="{{ !empty($dateFrom)?$dateFrom:'' }}"
                           class="form-control" required>
                </div>
            </div>
            <div class="col-lg-3 col-md-8 col-sm-12">
                <div class="form-group">
                    <label for="title">
                        {{--{{__('bread.reports.date_to')}}--}}
                        Date to
                        <span class="required"></span>
                    </label>
                    <input type="date" name="date_to"
                           id="date_to"
                           value="{{ !empty($dateTo)?$dateTo:'' }}"
                           class="form-control" required>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="category_id">
                        Category
                        <span class="required"></span>
                    </label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $categoryId => $categoryName)
                            <option
                                value="{{ $categoryId }}">{{ !empty($categoryName) ? $categoryName : '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">
                <button type="submit"
                        class="btn btn-lg btn-primary search_btn">
                    Submit
                </button>
            </div>
        </div>
    </form>

    {{--    select by test id from testDetails start-----}}
    {{--    @if(count($testResultDetails)>0)--}}
{{--        @foreach($testResultDetails as $testResultDetail)--}}
{{--            <a href="{{url('/report-view',$testResultDetail)}}" class="btn-success">{{$testResultDetail}}</a>--}}
{{--        @endforeach--}}
{{--    @endif--}}

{{--    //select by test id from testDetails end-----}}

@endsection

