@extends('core')


@section('activegroup')
tabbuttonactive
@endsection


@section('htmlheader_title')
{{ trans('menu.group') }}
@endsection


@section('content')
    <div class="row-fluid">
        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/groupmanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.group') }}</strong></a> </h2>
            <hr class="hrbreakline">

            <!-- TREE SECTION -->
            <div class="col-md-2" style="background-color:#F5F5F5; padding-left:0;">
                <div class="col-md-12" style="background-color:blue;">
                    a
                </div>
            </div>

            <!-- MANAGE SECTION -->
            <div class="col-md-10" style="background-color: white">
                <div class="col-md-12">
                    <h3 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/groupmanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.group') }}</strong></a> </h3>
                    <hr class="hrbreakline">
                </div>

                <div class="col-md-12">
                    SEARCHBOX
                </div>

                <div class="col-md-12">
                    <table> <!-- bootstrap classes added by the uitheme widget -->
                            <thead>
                                <tr>
                                <th>Name</th>
                                <th>Major</th>
                                <th class="filter-select filter-exact" data-placeholder="Pick a gender">Sex</th>
                                <th>English</th>
                                <th>Japanese</th>
                                <th>Calculus</th>
                                <th>Geometry</th></tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Name</th>
                                <th>Major</th>
                                <th>Sex</th>
                                <th>English</th>
                                <th>Japanese</th>
                                <th>Calculus</th>
                                <th>Geometry</th>
                                </tr>
                                <tr>
                                <th colspan="7" class="ts-pager form-inline">
                                    <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" class="btn btn-default first"><span class="glyphicon glyphicon-step-backward"></span></button>
                                    <button type="button" class="btn btn-default prev"><span class="glyphicon glyphicon-backward"></span></button>
                                    </div>
                                    <span class="pagedisplay"></span>
                                    <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" class="btn btn-default next"><span class="glyphicon glyphicon-forward"></span></button>
                                    <button type="button" class="btn btn-default last"><span class="glyphicon glyphicon-step-forward"></span></button>
                                    </div>
                                    <select class="form-control input-sm pagesize" title="Select page size">
                                    <option selected="selected" value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="all">All Rows</option>
                                    </select>
                                    <select class="form-control input-sm pagenum" title="Select page number"></select>
                                </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr><td>Student01</td><td>Languages</td><td>male</td><td>80</td><td>70</td><td>75</td><td>80</td></tr>
                                <tr><td>Student02</td><td>Mathematics</td><td>male</td><td>90</td><td>88</td><td>100</td><td>90</td></tr>
                                <tr><td>Student03</td><td>Languages</td><td>female</td><td>85</td><td>95</td><td>80</td><td>85</td></tr>
                                <tr><td>Student04</td><td>Languages</td><td>male</td><td>60</td><td>55</td><td>100</td><td>100</td></tr>
                                <tr><td>Student05</td><td>Languages</td><td>female</td><td>68</td><td>80</td><td>95</td><td>80</td></tr>
                                <tr><td>Student06</td><td>Mathematics</td><td>male</td><td>100</td><td>99</td><td>100</td><td>90</td></tr>
                                <tr><td>Student07</td><td>Mathematics</td><td>male</td><td>85</td><td>68</td><td>90</td><td>90</td></tr>
                                <tr><td>Student08</td><td>Languages</td><td>male</td><td>100</td><td>90</td><td>90</td><td>85</td></tr>
                                <tr><td>Student09</td><td>Mathematics</td><td>male</td><td>80</td><td>50</td><td>65</td><td>75</td></tr>
                                <tr><td>Student10</td><td>Languages</td><td>male</td><td>85</td><td>100</td><td>100</td><td>90</td></tr>
                                <tr><td>Student11</td><td>Languages</td><td>male</td><td>86</td><td>85</td><td>100</td><td>100</td></tr>
                                <tr><td>Student12</td><td>Mathematics</td><td>female</td><td>100</td><td>75</td><td>70</td><td>85</td></tr>
                                <tr><td>Student13</td><td>Languages</td><td>female</td><td>100</td><td>80</td><td>100</td><td>90</td></tr>
                                <tr><td>Student14</td><td>Languages</td><td>female</td><td>50</td><td>45</td><td>55</td><td>90</td></tr>
                                <tr><td>Student15</td><td>Languages</td><td>male</td><td>95</td><td>35</td><td>100</td><td>90</td></tr>
                                <tr><td>Student16</td><td>Languages</td><td>female</td><td>100</td><td>50</td><td>30</td><td>70</td></tr>
                                <tr><td>Student17</td><td>Languages</td><td>female</td><td>80</td><td>100</td><td>55</td><td>65</td></tr>
                                <tr><td>Student18</td><td>Mathematics</td><td>male</td><td>30</td><td>49</td><td>55</td><td>75</td></tr>
                                <tr><td>Student19</td><td>Languages</td><td>male</td><td>68</td><td>90</td><td>88</td><td>70</td></tr>
                                <tr><td>Student20</td><td>Mathematics</td><td>male</td><td>40</td><td>45</td><td>40</td><td>80</td></tr>
                                <tr><td>Student21</td><td>Languages</td><td>male</td><td>50</td><td>45</td><td>100</td><td>100</td></tr>
                                <tr><td>Student22</td><td>Mathematics</td><td>male</td><td>100</td><td>99</td><td>100</td><td>90</td></tr>
                                <tr><td>Student23</td><td>Mathematics</td><td>male</td><td>82</td><td>77</td><td>0</td><td>79</td></tr>
                                <tr><td>Student24</td><td>Languages</td><td>female</td><td>100</td><td>91</td><td>13</td><td>82</td></tr>
                                <tr><td>Student25</td><td>Mathematics</td><td>male</td><td>22</td><td>96</td><td>82</td><td>53</td></tr>
                                <tr><td>Student26</td><td>Languages</td><td>female</td><td>37</td><td>29</td><td>56</td><td>59</td></tr>
                                <tr><td>Student27</td><td>Mathematics</td><td>male</td><td>86</td><td>82</td><td>69</td><td>23</td></tr>
                                <tr><td>Student28</td><td>Languages</td><td>female</td><td>44</td><td>25</td><td>43</td><td>1</td></tr>
                                <tr><td>Student29</td><td>Mathematics</td><td>male</td><td>77</td><td>47</td><td>22</td><td>38</td></tr>
                                <tr><td>Student30</td><td>Languages</td><td>female</td><td>19</td><td>35</td><td>23</td><td>10</td></tr>
                                <tr><td>Student31</td><td>Mathematics</td><td>male</td><td>90</td><td>27</td><td>17</td><td>50</td></tr>
                                <tr><td>Student32</td><td>Languages</td><td>female</td><td>60</td><td>75</td><td>33</td><td>38</td></tr>
                                <tr><td>Student33</td><td>Mathematics</td><td>male</td><td>4</td><td>31</td><td>37</td><td>15</td></tr>
                                <tr><td>Student34</td><td>Languages</td><td>female</td><td>77</td><td>97</td><td>81</td><td>44</td></tr>
                                <tr><td>Student35</td><td>Mathematics</td><td>male</td><td>5</td><td>81</td><td>51</td><td>95</td></tr>
                                <tr><td>Student36</td><td>Languages</td><td>female</td><td>70</td><td>61</td><td>70</td><td>94</td></tr>
                                <tr><td>Student37</td><td>Mathematics</td><td>male</td><td>60</td><td>3</td><td>61</td><td>84</td></tr>
                                <tr><td>Student38</td><td>Languages</td><td>female</td><td>63</td><td>39</td><td>0</td><td>11</td></tr>
                                <tr><td>Student39</td><td>Mathematics</td><td>male</td><td>50</td><td>46</td><td>32</td><td>38</td></tr>
                                <tr><td>Student40</td><td>Languages</td><td>female</td><td>51</td><td>75</td><td>25</td><td>3</td></tr>
                                <tr><td>Student41</td><td>Mathematics</td><td>male</td><td>43</td><td>34</td><td>28</td><td>78</td></tr>
                                <tr><td>Student42</td><td>Languages</td><td>female</td><td>11</td><td>89</td><td>60</td><td>95</td></tr>
                                <tr><td>Student43</td><td>Mathematics</td><td>male</td><td>48</td><td>92</td><td>18</td><td>88</td></tr>
                                <tr><td>Student44</td><td>Languages</td><td>female</td><td>82</td><td>2</td><td>59</td><td>73</td></tr>
                                <tr><td>Student45</td><td>Mathematics</td><td>male</td><td>91</td><td>73</td><td>37</td><td>39</td></tr>
                                <tr><td>Student46</td><td>Languages</td><td>female</td><td>4</td><td>8</td><td>12</td><td>10</td></tr>
                                <tr><td>Student47</td><td>Mathematics</td><td>male</td><td>89</td><td>10</td><td>6</td><td>11</td></tr>
                                <tr><td>Student48</td><td>Languages</td><td>female</td><td>90</td><td>32</td><td>21</td><td>18</td></tr>
                                <tr><td>Student49</td><td>Mathematics</td><td>male</td><td>42</td><td>49</td><td>49</td><td>72</td></tr>
                                <tr><td>Student50</td><td>Languages</td><td>female</td><td>56</td><td>37</td><td>67</td><td>54</td></tr>
                            </tbody>
                            </table>
                </div>
            </div>

            <script src="{{ asset('js/tablesorter.js') }}">
            </script>


        </div>
    </div>
@endsection