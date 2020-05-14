# 1. 개발환경
- OS : Windows10
- xampp7.4.5 : PHP 7.4.5, MaridaDB 10.4.11, Apache 2.4.43
- framework : codeigniter 3.x
- Api 문서 생성 : apiDoc(npm install)

# 2. 요구사항에 대한 답변
## 2.1 클라이언트(iOS, Android, Web APP)에서 사용할 API 개발
 1. RESTful API 설계에 대한 내용으로 확인하였으며, Codeigniter에 REST 컨트롤러 라이브러리를 사용하여 기본적인 규격을 설정하였습니다.
 
 2. www/controller/api/v2/member 이하의 디렉토리를 확인하시면 회원 가입/상세정보, 로그인, 로그아웃에 대한 개략적인 프로토타입을 구성해 놓았습니다.
 
 3. 회원 및 주문에 대한 속성에 대한 Validation은 정규표현식 또는 Form_Validation(web의 경우) 헬퍼를 사용하면 될 것으로 예상합니다.
 
 4. 데이터 베이스 Master - Replication 구성에 대한 처리는 Create, Update, Delete 처리에 대해서는 Master DB에 접속하여 처리하게 하고, Select에 대해서는 Replication 서버에 접속하여 처리하게 해야합니다. codeigniter의 경우 core(Model)에 재정의 해서 사용하면 됩니다. 예를 들면 마스터 DB는 $this->mdb, Replication DB는 $this->sdb 와 같이 구분합니다.

## 2.2 API를 쉽게 이해할 수 있는 문서 작성
 1. node apiDoc 패키지를 이용하여 문서를 자동 생성하였습니다. apiDoc 디렉토리 이하의 index.html 문서입니다. Swagger는 사용해보지 않았습니다.
 
## 2.3 테이블 설계
 1. homework.sql 내용을 참고해주시기 바랍니다.

## 2.4 기타
 1. 로그인 아이디는 이메일을 기준으로 합니다.
 
 2. 사용자의 비밀번호는 password_hash, password_verity 함수를 사용하여 처리하였습니다.
 
 3. Web과 App에서 모두 사용한 API를 설계하기 위해서 OAuth또는 그에 준하는 키 발급과 같은 인증을 두는 것이 좋아보입니다. Session은 웹 기준으로만 사용할 수 있습니다.
 
 4. Timezone을 고려한 결제일시 처리에 대해서는 DB저장 시 UTC기준으로 INSERT, SELECT 기준 KST로 변경하는 방법이 있습니다. 혹은 timestamp 값으로 저장하는 방법도 있습니다. 보통은 php.ini timezone 설정 기준으로 처리하게 됩니다.
 
 5. 여러회원 목록 조회시 index를 참조하여 조회할 수 있도록 쿼리를 구성해야 합니다. 이름,이메일 <- 여기에 index key를 설정하면 보다 빠르게 조회할 수 있습니다. 각 회원의 마지막 주문 정보는 sub query join 또는 기타 join 조건들을 검토하여 조회 해야합니다. (explain 사용하며 최적화)
 
 6. 페이지네이션은 기본적으로 LIMIT + OFFSET, ORDER BY로 처리 합니다.
 
 
 
# 만족스러운 답변을 드리지 못하여 죄송하게 생각합니다. 
