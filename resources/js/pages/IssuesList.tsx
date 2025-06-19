import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { fetchIssues } from '../api';
import { Issue } from '../types';

export default function IssuesList() {
  const [issues, setIssues] = useState<Issue[]>([]);

  useEffect(() => {
    fetchIssues().then(setIssues);
  }, []);

  return (

    <div className="space-y-4">
      <h3 className='text-black'>Issues assigned to you:</h3>
        {issues.length === 0 && (
            <div className="text-gray-600">No issues assigned to you.</div>
        )}
      {issues.map((issue) => (
        <div key={issue.id} className="p-4 bg-white rounded shadow hover:shadow-lg transition">
          <Link
            to={`/issues/${issue.repository.owner.login}/${issue.repository.name}/${issue.number}`}
            className="text-blue-600 font-semibold text-lg hover:underline"
          >
            #{issue.number} – {issue.title}
          </Link>
          <div className="text-sm text-gray-500">
            Created: {new Date(issue.created_at).toLocaleDateString()}
          </div>
        </div>
      ))}
    </div>
  );
}
