import React from 'react';

export default UserList;

function UserList({users}) {
  return (
    <table className="table table-sm table-hover">
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        {users.map((user) => (
          <tr key={user.id}>
            <td>{user.username}</td>
            <td>{user.email}</td>
            <td>{user.created_at}</td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}
