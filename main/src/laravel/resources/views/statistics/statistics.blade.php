@extends('layouts.app')

@section('title', 'Company Statistics')

@section('content')
    <div class="row">
        <div class="col s10">
        <span class="card-title">
            Company Statistics
        </span>
        </div>
    </div>
    <hr/>
    <br/>

    <div class="row">
        <div class="col l6 m12 s12">
        <span class="attribute-category">
            Departments
        </span>
            <div class="attribute-container">
                <p class="attribute">
                    Count: {{ $dept_count }}
                </p>
                <p class="attribute">
                    Most Employees: {{ $max_emp[0]->{'Count'} }} - {{ Helper::getDepartmentName($max_emp[0]->{'department_id'}, $departments) }}
                </p>
                <p class="attribute">
                    Least Employees: {{ $min_emp[0]->{'Count'} }} - {{ Helper::getDepartmentName($min_emp[0]->{'department_id'}, $departments) }}
                </p>
                <p class="attribute">
                    Most Projects: {{ $max_pro[0]->{'Count'} }} - {{ Helper::getDepartmentName($max_pro[0]->{'department_id'}, $departments) }}
                </p>
                <p class="attribute">
                    Least Projects: {{ $min_pro[0]->{'Count'} }} - {{ Helper::getDepartmentName($min_pro[0]->{'department_id'}, $departments) }}
                </p>
                <p class="attribute">
                    Highest Pay: ${{ $dep_high[0]->{'Pay'} }} - {{ Helper::getDepartmentName($dep_high[0]->{'department_id'}, $departments) }}
                </p>
                <p class="attribute">
                    Lowest Pay: ${{ $dep_low[0]->{'Pay'} }} - {{ Helper::getDepartmentName($dep_low[0]->{'department_id'}, $departments) }}
                </p>
            </div>
        </div>
        <div class="col l6 m12 s12">
        <span class="attribute-category">
            Employees
        </span>
            <div class="attribute-container">
                <p class="attribute">
                    Count: {{ $emp_count }}
                </p>
                <p class="attribute">
                    Most Projects: {{ $emp_max[0]->{'Count'} }} - {{ $emp_max[0]->{'first_name'} }} {{ $emp_max[0]->{'last_name'} }}
                </p>
                <p class="attribute">
                    Least Projects: {{ $emp_min[0]->{'Count'} }} - {{ $emp_min[0]->{'first_name'} }} {{ $emp_min[0]->{'last_name'} }}
                </p>
                <p class="attribute">
                    Most Subordinates: {{ $sup_max[0]->{'Count'} }} - {{ $sup_max[0]->{'first_name'} }} {{ $sup_max[0]->{'last_name'} }}
                </p>
                <p class="attribute">
                    Least Subordinates: {{ $sup_min[0]->{'Count'} }} - {{ $sup_min[0]->{'first_name'} }} {{ $sup_min[0]->{'last_name'} }}
                </p>
                <p class="attribute">
                    Sum Salary: ${{ $sal_tot[0]->{'Count'} }}/hr
                </p>
                <p class="attribute">
                    Total Pay: ${{ $pro_tot[0]->{'SUM(Pay)'} }}
                </p>
            </div>
        </div>
        <div class="col l6 m12 s12">
        <span class="attribute-category">
            Projects
        </span>
            <div class="attribute-container">
                <p class="attribute">
                    Count: {{ $pro_count }}
                </p>
                <p class="attribute">
                    Most Employees: {{ $pro_max[0]->{'Count'} }} - {{ $pro_max[0]->name }}
                </p>
                <p class="attribute">
                    Least Employees: {{ $pro_min[0]->{'Count'} }} - {{ $pro_min[0]->name }}
                </p>
                <p class="attribute">
                    Total Pay: ${{ $pro_tot[0]->{'SUM(Pay)'} }}
                </p>
                <p class="attribute">
                    Highest Pay: ${{ $pro_high[0]->{'Pay'} }} - {{ $pro_high[0]->name }}
                </p>
                <p class="attribute">
                    Lowest Pay: ${{ $pro_low[0]->{'Pay'} }} - {{ $pro_low[0]->name }}
                </p>
                <p class="attribute">
                    Total Hours: {{ $pro_tot_hr[0]->{'Count'} }}
                </p>
                <p class="attribute">
                    Weekly Pay: ${{ $weekly[0]->{'Pay'} }}
                </p>
            </div>
        </div>
        <div class="col l6 m12 s12">
        <span class="attribute-category">
            Locations
        </span>
            <div class="attribute-container">
                <p class="attribute">
                    Count: {{ $loc_count }}
                </p>
                <p class="attribute">
                    Most Projects: {{ $loc_max[0]->{'Count'} }} - {{ $loc_max[0]->name }}
                </p>
                <p class="attribute">
                    Least Projects: {{ $loc_min[0]->{'Count'} }} - {{ $loc_min[0]->name }}
                </p>
            </div>
        </div>
    </div>
@endsection