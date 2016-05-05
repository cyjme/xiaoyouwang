var trends = [{
    touXiangUrl: '/images/touxiang/touxiang.jpg',
    name: '梁凯莉',
    qianMing: '这是个性签名',
    time: '19:20',
    content: '当我真的可以一个人处理所有事的时候，那便真的是做好一个人生活的准备的时候；而那时我想我会感激你，给我那么多的时间去学会做一个精神上生活上都足够强大的人',
    imageUrl: '/images/test.jpg',
    trendId: 12,
    agree: '12',
    comments: [
        {
            userName: '常元检',
            commentContent: '这是评论的内容'
        },
        {
            userName: '陈平胜',
            commentContent: '这是陈平胜的评论内容'
        }
    ],
    commentNumber: '34',
    agreeNumber: '45'
}
];

var Trend = React.createClass({
    render: function () {
        return (
            <div className="trend col-lg-12">
                <div>
                    <p className="trendContent">{this.props.data.content}</p>
                    <img src={this.props.data.imageUrl} alt="动态关联的照片" className="img-responsive"/>
                </div>
            </div>
        );
    }
});

var Agree = React.createClass({
    handleClickAgree: function () {
        var trendId = this.props.data;
        var data = {trendId: trendId};
        $.ajax({
            url: '/trend/agree',
            type: 'POST',
            dataType: 'json',
            data: data,

            success: function () {
                console.log('点赞');
            }.bind(this),

            error: function () {
                alert('点赞失败');
            }.bind(this)

        });
    },

    render: function () {
        return (
            <div className="agree col-lg-12">
                <div className="pinglun col-lg-3">
                    <span style={{color:"#337ab7"}}>评论({this.props.commentNumber})</span>
                </div>
                <div className="zhuanfa col-lg-3">
                    <a href="">转发</a>
                </div>
                <div className="zan col-lg-3">
                    <span onClick={this.handleClickAgree} style={{color:"#337ab7"}}>赞({this.props.agreeNumber})</span>
                </div>
                <div className="shoucang col-lg-3">
                    <a href="">收藏</a>
                </div>
            </div>
        )
    }
});

var CommentContent = React.createClass({
    render: function () {
        return (
            <div className="col-lg-12">
                <p><span className="commentUserName">{this.props.userName}</span>：{this.props.children}</p>
            </div>
        );
    }
});

var CommentList = React.createClass({
    render: function () {
        var commentNode = this.props.data.comments.map(function (comment) {
            return (
                <div>
                    <CommentContent userName={comment.userName}>
                        {comment.commentContent}
                    </CommentContent>
                </div>
            );

        });
        return (
            <div className="commentList">
                {commentNode}
            </div>
        );
    }
});

var CommentForm = React.createClass({
    handleSubmit: function (e) {
        e.preventDefault();
        var commentText = this.refs.commentText.value.trim();
        var trendId = this.props.data;
        var comment = {
            commentText: commentText,
            trendId: trendId
        };

        $.ajax({
            url: '/trend/putComment',
            dataType: 'json',
            type: 'POST',
            data: comment,
            success: function () {
                alert('评论发表成功！');
            }.bind(this),
            error: function () {
                alert('评论失败');
            }.bind(this)
        });
        this.refs.commentText.value = "";
    },

    render: function () {
        return (
            <div>
                <div className="col-lg-12">
                    <div>
                        <form onSubmit={this.handleSubmit}>
                            <input type="text" className="col-lg-10" placeholder="我也说一句" ref="commentText"/>
                            <button type="submit" className="col-lg-2">评论</button>
                        </form>
                    </div>
                </div>
            </div>
        )
    }
});

var Header = React.createClass({
    render: function () {
        return (
            <div className="header col-lg-12">
                <div className="left-touXiang col-lg-2">
                    <img src={this.props.data.touXiangUrl} alt="用户头像"/>
                </div>
                <div className="right col-lg-10">
                    <div className="row">
                        <div className="top row">
                            <div className="header-name col-lg-2">
                                {this.props.data.name}
                            </div>
                            <div className="qianMing col-lg-10">
                                {this.props.data.qianMing}
                            </div>
                        </div>
                    </div>
                    <div className="header-time row">
                        <div className="bottom row">
                            <div className="time col-lg-12">
                                {this.props.data.time}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
});

var SchoolBox = React.createClass({
    render: function () {

        return (
            <div className="schoolBox row">
                <Header data={this.props.data}/>
                <Trend data={this.props.data}/>
                <Agree data={this.props.data.trendId} commentNumber={this.props.data.commentNumber} agreeNumber={this.props.data.agree}/>
                <CommentList data={this.props.data}/>
                <CommentForm data={this.props.data.trendId}/>
            </div>
        );
    }
});

var SchoolList = React.createClass({
    render: function () {
        var schoolBoxNode = this.props.data.map(function (trend) {
            return (
                <div>
                    <SchoolBox data={trend}/>
                </div>
            );
        });

        return (
            <div>
                {schoolBoxNode}
            </div>
        );
    }
});

var School = React.createClass({
    loadTrendsFromServer: function () {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: function (data) {
                console.log(data.trends);
                this.setState({data: data.trends});
            }.bind(this),
            error: function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },

    getInitialState: function () {
        return {data: []};
    },

    componentDidMount: function () {
        this.loadTrendsFromServer();
        setInterval(this.loadTrendsFromServer, this.props.pollInterbval);
    },

    render: function () {
        return (
            <div>
                <SchoolList data={this.state.data}/>
            </div>
        )
    }

});

//ReactDOM.render(
//    <School data={trends}/>,
//    document.getElementById('school')
//);
ReactDOM.render(
    <School url="http://xiaoyouwang.com/trend/getSchool" pollInterbval={1000}/>,
    document.getElementById('school')
);