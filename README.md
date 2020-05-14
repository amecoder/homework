# 1. 개발환경
- OS : Windows10
- xampp7.4.5 : PHP 7.4.5, MaridaDB 10.4.11, Apache 2.4.43
- framework : codeigniter 3.x
- Api 문서 생성 : apiDoc(npm install)

# 2. 요구사항에 대한 답변
## 2.1 클라이언트(iOS, Android, Web APP)에서 사용할 API 개발
 1. RESTful API 설계에 대한 내용으로 확인하였으며, Codeigniter에 RESTFul 라이브러리를 사용하여 기본적인 규격을 설정하였습니다.
 
 2. www/controller/api/v2/member 이하의 디렉토리를 확인하시면 회원 가입/상세정보, 로그인, 로그아웃에 대한 개략적인 프로토타입을 구성해 놓았습니다.
 
 3. 회원 및 주문에 대한 속성에 대한 Validation은 정규표현식 또는 Form_Validation 헬퍼를 사용하면 될 것으로 예상합니다.
 
 4. 데이터 베이스 Master - Replication 구성에 대한 처리는 Create, Update, Delete 처리에 대해서는 Master DB에 접속하여 처리하게 하고, Select에 대해서는 Replication 서버에 접속하여 처리하게 해야합니다. codeigniter의 경우 core(Model)에 재정의 해서 사용하면 됩니다.

## 2.2 API를 쉽게 이해할 수 있는 문서 작성
 1. node apiDoc 패키지를 이용하여 문서를 자동 생성하였습니다. apiDoc 디렉토리 이하의 index.html 문서입니다.
 
## 2.3 테이블 설계
 1. homework.sql 내용을 참고해주시기 바랍니다.
