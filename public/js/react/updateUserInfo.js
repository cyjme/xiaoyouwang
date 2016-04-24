var SchoolInfo = React.createClass({

    handleSubmitSchool: function (e) {
        e.preventDefault();
        console.log('上传学校信息');
        var school_name = this.refs.school_name.value.trim();
        var faculty = this.refs.faculty.value.trim();
        var major = this.refs.major.value.trim();
        var grade = this.refs.grade.value.trim();
        var school_year = this.refs.school_year.value.trim();
        var phone_number = this.refs.phone_number.value.trim();
        var interest = this.refs.interest.value.trim();
        var userInfo = {
            school_name: school_name,
            faculty: faculty,
            major: major,
            grade: grade,
            school_year: school_year,
            phone_number: phone_number,
            interest: interest
        };
        $.ajax({
            type: 'POST',
            url: '/home/updateUserInfo/school',
            dataType: 'json',
            data: userInfo,
            success: function (data) {
                alert('学校信息已更新');
            }.bind(this),
            error: function (xhr, status, err) {
                console.log(status, err.toString());
            }.bind(this)
        });
    },


    render: function () {
        return (
            <div className="panel panel-default">
                <div className="panel-heading">
                    学校信息
                </div>
                <div className="panel-body">
                    <div>
                        <form className="form" onSubmit={this.handleSubmitSchool}>
                            <div className="form-group">
                                <label for="">学校名字：</label>
                                <select name="" id="" ref="school_name" className="form-control">
                                    <option value="许昌学院">许昌学院</option>
                                    <option value="郑州大学">郑州大学</option>
                                    <option value="河南大学">河南大学</option>
                                    <option value="郑州轻工业学院">郑州轻工业学院</option>
                                </select>
                            </div>
                            <div className="form-group">
                                <label for="">院系：</label>
                                <input type="text" className="form-control" ref="faculty"/>
                            </div>
                            <div className="form-group">
                                <label for="">专业：</label>
                                <input type="text" className="form-control" ref="major"/>
                            </div>
                            <div className="form-group">
                                <label for="">年级：</label>
                                <input type="text" placeholder="请输入入学年份，如：2013" className="form-control" ref="grade"/>
                            </div>
                            <div className="form-group">
                                <label for="">年制：</label>
                                <select name="" id="" ref="school_year" className="form-control">
                                    <option value="2">两年制</option>
                                    <option value="3">三年制</option>
                                    <option value="4">四年制</option>
                                    <option value="5">五年制</option>
                                </select>
                            </div>
                            <div className="form-group">
                                <label for="phone_number">手机号码：</label>
                                <input type="text" className="form-control" ref="phone_number"/>
                            </div>
                            <div className="form-group">
                                <label for="">兴趣爱好</label>
                                <input type="text" className="form-control" ref="interest"/>
                            </div>
                            <div className="form-group">
                                <button type="submit" className="form-control btn btn-success">更新信息</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
});

var WorkInfo = React.createClass({
    handleSubmitWork: function (e) {
        e.preventDefault();
        console.log('上传工作信息');
        var company = this.refs.company.value.trim();
        var city = this.refs.city.value.trim();
        var userInfo = {
            company: company,
            city: city
        };
        $.ajax({
            type: 'POST',
            url: '/home/updateUserInfo/work',
            dataType: 'json',
            data: userInfo,
            success: function (data) {
                alert('工作信息已更新');
            }.bind(this),
            error: function (xhr, status, err) {
                console.log(status, err.toString());
            }.bind(this)
        });
    },

    render: function () {
        return (
            <div className="panel panel-default">
                <div className="panel-heading">
                    工作信息
                </div>
                <div className="panel-body">
                    <form onSubmit={this.handleSubmitWork}>
                        <div className="form-group">
                            <label for="">公司</label>
                            <input type="text" className="form-control" ref="company"/>
                        </div>
                        <div className="form-group">
                            <label htmlFor="">城市</label>
                            <input type="text" className="form-control" ref="city"/>
                        </div>
                        <div className="form-group">
                            <button type="submit" className="form-control btn btn-success">更新信息</button>
                        </div>
                    </form>
                </div>
            </div>
        );
    }
});

var BasicInfo = React.createClass({
    handleSubmitBasic: function (e) {
        e.preventDefault();
        console.log('上传基本信息');
        var name = this.refs.name.value.trim();
        var sex = this.refs.sex.value.trim();
        var jiaxiang = this.refs.jiaxiang.value.trim();
        var gexingqianming = this.refs.gexingqianming.value.trim();
        var userInfo = {
            name: name,
            sex: sex,
            jiaxiang: jiaxiang,
            gexingqianming: gexingqianming
        };
        $.ajax({
            type: 'POST',
            url: '/home/updateUserInfo/basic',
            dataType: 'json',
            data: userInfo,
            success: function (data) {
                alert('基本信息已更新');
            }.bind(this),
            error: function (xhr, status, err) {
                console.log(status, err.toString());
            }.bind(this)
        });
    },

    render: function () {
        return (
            <div>
                <div className="panel panel-default">
                    <div className="panel-heading">
                        基本信息
                    </div>
                    <div className="panel-body">
                        <form action="" onSubmit={this.handleSubmitBasic}>
                            <div className="form-group">
                                <label for="">姓名：</label>
                                <input type="text" className="form-control" ref="name"/>
                            </div>
                            <div className="form-group">
                                <label for="">性别：</label>
                                <select name="" id="" className="form-control" ref="sex">
                                    <option value="男">男</option>
                                    <option value="女">女</option>
                                </select>
                            </div>
                            <div className="form-group">
                                <label for="">家乡：</label>
                                <input type="text" className="form-control" ref="jiaxiang"/>
                            </div>
                            <div className="form-group">
                                <label for="">个性签名</label>
                                <input type="text" className="form-control" ref="gexingqianming"/>

                            </div>
                            <div className="form-group">
                                <button type="submit" className="form-control btn btn-success">更新信息</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        );
    }
});

var UpdateUserInfo = React.createClass({
    render: function () {
        return (
            <div>
                <div className="row col-lg-10 col-lg-offset-1">
                    <div className="col-lg-6">
                        <SchoolInfo />
                    </div>
                    <div className="col-lg-6">
                        <BasicInfo />
                    </div>
                </div>
                <div className="row col-lg-10 col-lg-offset-1">
                    <div className="col-lg-6">
                        <WorkInfo />
                    </div>
                </div>
            </div>
        );
    }
});

ReactDOM.render(
    <UpdateUserInfo />,
    document.getElementById('UpdateUserInfo')
);