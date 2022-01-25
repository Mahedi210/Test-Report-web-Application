@if(count($categoryTests) > 0)
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Test Name</th>
                    <th scope="col">Result</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>

                @if(count($categoryTests) > 0)
                      @foreach($categoryTests as $categoryTest)
                                <tr>
{{--                                    <input type="hidden" name="test_id[$testId]" value="{{ $testId }}" class="mr-1">--}}
                                    <td><label class="mr-2">{{ !empty($categoryTest->test->test_name) ? $categoryTest->test->test_name : '' }}</label></td>
                                    <td><input type="result" name="results[{{ $categoryTest->test_id }}]" id="results"
                                               value=""
                                               class="form-control"></td>
                                    <td><input type="remark" name="remarks[{{ $categoryTest->test_id }}]" id="remarks"
                                               value=""
                                               class="form-control"></td>
                                    <td><input type="date" name="dates[{{ $categoryTest->test_id }}]"  id="dates"
                                               value="{{ date('Y-m-d', strtotime(\Carbon\Carbon::now())) }}"
                                               class="form-control"></td>
                                </tr>
                        @endforeach
                        @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-outline-secondary float-right">Submit</button>
        </div>
    </div>
@endif
