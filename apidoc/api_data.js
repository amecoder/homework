define({ "api": [
  {
    "type": "get",
    "url": "/member/join?:member_seq",
    "title": "회원 상세정보",
    "name": "Detail",
    "group": "Member",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "member_seq",
            "description": "<p>회원 번호</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "Json",
            "description": "<p>결과</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "api/v1/member/Detail.php",
    "groupTitle": "Member"
  },
  {
    "type": "post",
    "url": "/member/join",
    "title": "회원가입",
    "name": "Join",
    "group": "Member",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "email",
            "description": "<p>회원 이메일</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "name",
            "description": "<p>이름</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "nick",
            "description": "<p>별명</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "password",
            "description": "<p>비밀번호</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "phone",
            "description": "<p>전화번호</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "gender",
            "description": "<p>성별</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "Json",
            "description": "<p>결과</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "api/v1/member/Join.php",
    "groupTitle": "Member"
  },
  {
    "type": "post",
    "url": "/member/login",
    "title": "로그인",
    "name": "Login",
    "group": "Member",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "email",
            "description": "<p>회원 이메일</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "password",
            "description": "<p>비밀번호</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "Json",
            "description": "<p>결과</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "api/v1/member/Login.php",
    "groupTitle": "Member"
  },
  {
    "type": "get",
    "url": "/member/logout",
    "title": "로그아웃",
    "name": "Logout",
    "group": "Member",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "Json",
            "description": "<p>결과</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "api/v1/member/Logout.php",
    "groupTitle": "Member"
  }
] });
